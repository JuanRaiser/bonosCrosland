import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/react';

type Moto = {
  id_moto: number;
  nombre: string;
  model: string;
  precio: string | number;
};

type Props = { motos: Moto[] };

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Revisar cupón', href: '/revisarcupon' },
];

export default function Revisarcupon({ motos = [] }: Props) {
  const { data, setData, post, processing, errors, reset } = useForm({
    dni: '',
    nombre: '',
    apellidos: '',
    id_moto: '',  // <- unificado
    precio: '',   // editable, sin efecto por ahora
  });

  const precioMotoSeleccionada =
    motos.find(m => m.id_moto === Number(data.id_moto))?.precio ?? '';

  const submit = (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    post(route('voucher.store'), {
      onSuccess: () => {
        alert('✅ Cupon aceptado, consultar descuento final');
        reset();
      },
      onError: () => {
        alert('❌ Error');
        console.log(errors);
      },
    });
  };

  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title="Registrar Cliente y Voucher" />
      <div className="max-w-md mx-auto bg-gray-800 p-6 rounded-lg">
        <form onSubmit={submit}>
          <label className="block text-white">DNI</label>
          <input
            type="text"
            value={data.dni}
            onChange={(e) => setData('dni', e.target.value)}
            className="w-full p-2 rounded"
          />
          {errors.dni && <p className="text-red-400 text-sm">{errors.dni}</p>}

          <label className="block text-white mt-2">Nombre</label>
          <input
            type="text"
            value={data.nombre}
            onChange={(e) => setData('nombre', e.target.value)}
            className="w-full p-2 rounded"
          />
          {errors.nombre && <p className="text-red-400 text-sm">{errors.nombre}</p>}

          <label className="block text-white mt-2">Apellidos</label>
          <input
            type="text"
            value={data.apellidos}
            onChange={(e) => setData('apellidos', e.target.value)}
            className="w-full p-2 rounded"
          />

          <label className="block text-white mt-2">Moto</label>
          <select
            value={data.id_moto}
            onChange={(e) => setData('id_moto', e.target.value)}
            className="w-full p-2 rounded"
          >
            <option value="">Seleccione una moto</option>
            {motos.map((m) => (
              <option key={m.id_moto} value={m.id_moto}>
                {m.nombre} - {m.model} - S/ {m.precio}
              </option>
            ))}
          </select>
          {errors.id_moto && <p className="text-red-400 text-sm">{errors.id_moto}</p>}

          <label className="block text-white mt-2">Cupón de descuento</label>
          <input
            type="text"
            value={data.precio}
            onChange={(e) => setData('precio', e.target.value)}
            className="w-full p-2 rounded"
          />

          {precioMotoSeleccionada !== '' && (
            <p className="text-green-400 mt-2">
              Precio actual (BD): S/ {precioMotoSeleccionada}
            </p>
          )}

          <button
            type="submit"
            disabled={processing}
            className="bg-blue-600 px-4 py-2 rounded text-white mt-4"
          >
            Guardar
          </button>
        </form>
      </div>
    </AppLayout>
  );
}
