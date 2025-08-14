import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'clientes',
        href: '/clientes',
    },
];

export default function Cliente() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="cliente" />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
                <div className="">
                    clientes
                </div>
            </div>
        </AppLayout>
    );
}
