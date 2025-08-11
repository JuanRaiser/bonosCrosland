import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Agregar Cupon',
        href: '/agregarcupon',
    },
];

export default function AgregarCupon() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Agregar Cupon" />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
                <div className="">
                    Crear Cupon
                </div>
            </div>
        </AppLayout>
    );
}
