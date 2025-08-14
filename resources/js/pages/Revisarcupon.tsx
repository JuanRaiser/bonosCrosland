import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/react';

// Tipo para los clientes
type Cliente = {
    id_cliente: number;
    dni: string;
    nombre: string;
    apellidos: string;
};
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Revisar cupón',
        href: '/revisarcupon',
    },
];

interface Props {
    clientes: Cliente[];
}

export default function Revisarcupon({ motos = [] }) {
    const { data, setData, post, processing, errors } = useForm({
        dni: '',
        nombre: '',
        apellidos: '',
        moto_id: '',
        precio: '' // nuevo campo editable
    });

    const precioMotoSeleccionada = motos.find(m => m.id_moto === Number(data.moto_id))?.precio || '';

    const submit = (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        post(route('voucher.store'));
    };

    return (
        <AppLayout>
            <Head title="Registrar Cliente y Voucher" />
            <div className="max-w-md mx-auto bg-gray-800 p-6 rounded-lg">
                <form onSubmit={submit}>

                    <label className="block text-white">DNI</label>
                    <input type="text" value={data.dni}
                        onChange={(e) => setData('dni', e.target.value)}
                        className="w-full p-2 rounded" />

                    <label className="block text-white mt-2">Nombre</label>
                    <input type="text" value={data.nombre}
                        onChange={(e) => setData('nombre', e.target.value)}
                        className="w-full p-2 rounded" />

                    <label className="block text-white mt-2">Apellidos</label>
                    <input type="text" value={data.apellidos}
                        onChange={(e) => setData('apellidos', e.target.value)}
                        className="w-full p-2 rounded" />

                    <label className="block text-white mt-2">Moto</label>
                    <select value={data.moto_id}
                        onChange={(e) => setData('moto_id', e.target.value)}
                        className="w-full p-2 rounded">
                        <option value="">Seleccione una moto</option>
                        {motos.map(m => (
                            <option key={m.id_moto} value={m.id_moto}>
                                {m.id_moto} - {m.nombre} -  {m.model} - S/ {m.precio} - S/ {m.bono} - S/ {m.precio_base}
                            </option>
                        ))}
                    </select>

                    {/* Campo precio editable */}
                    <label className="block text-white mt-2">Precio</label>
                    <input type="number" value={data.precio}
                        onChange={(e) => setData('precio', e.target.value)}
                        className="w-full p-2 rounded" />

                    {/* Precio final automático */}
                    {precioMotoSeleccionada && (
                        <p className="text-green-400 mt-2">
                            Precio final (BD): S/ {precioMotoSeleccionada}
                        </p>
                    )}

                    <button type="submit"
                        disabled={processing}
                        className="bg-blue-600 px-4 py-2 rounded text-white mt-4">
                        Guardar
                    </button>
                </form>
            </div>
        </AppLayout>
    );
}