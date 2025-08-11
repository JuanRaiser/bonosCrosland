import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Panel',
        href: '/dashboard',
    },
];

export default function AgregarMoto() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Agregar Moto" />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
                <div className="">
                    Crear Moto
                </div>
            </div>
        </AppLayout>
    );
}
