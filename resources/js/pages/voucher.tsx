import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, usePage, router } from '@inertiajs/react';
import { useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Voucher',
        href: '/voucher',
    },
];

export default function Voucher() {
    const { props } = usePage();
    const successMessage = props.flash?.success;
    const voucherData = props.voucherData;

    const [dni, setDni] = useState('');

    const handleSearch = (e) => {
        e.preventDefault();
        router.get('/voucher', { dni }); // envía por query string
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Voucher" />

            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">

                {/* Mensaje de éxito */}
                {successMessage && (
                    <div className="bg-green-500 text-white p-2 rounded">
                        {successMessage}
                    </div>
                )}

                {/* Formulario búsqueda DNI */}
                <form onSubmit={handleSearch} className="flex gap-2">
                    <input
                        type="text"
                        value={dni}
                        onChange={(e) => setDni(e.target.value)}
                        placeholder="Ingrese DNI"
                        className="border p-2 rounded"
                    />
                    <button type="submit" className="bg-blue-500 text-white p-2 rounded">
                        Buscar
                    </button>
                </form>

                {/* Resultado */}
                {voucherData && (
                    <div className="mt-4 p-4 border rounded bg-gray-50">
                        <h2 className="text-lg font-bold mb-2">Datos del Voucher</h2>
                        <p><strong>Cliente:</strong> {voucherData.nombre}</p>
                        <p><strong>DNI:</strong> {voucherData.dni}</p>
                        <p><strong>Moto:</strong> {voucherData.voucher?.moto?.nombre}</p>
                        <p><strong>Precio final:</strong> {voucherData.voucher?.precio_final}</p>
                    </div>
                )}
            </div>
        </AppLayout>
    );
}
