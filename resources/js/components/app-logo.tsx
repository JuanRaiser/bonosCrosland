import AppLogoIcon from './app-logo-icon';
import logo from '../../images/logo.jpg';

export default function AppLogo() {
    return (
        <>
            <div className="flex aspect-square size-8 items-center justify-center rounded-md bg-sidebar-primary text-sidebar-primary-foreground">
                <img src={logo} alt="" />
            </div>
            <div className="ml-1 grid flex-1 text-left text-sm">
                <span className="mb-0.5 truncate leading-tight font-semibold">Sistema bonos...</span>
            </div>
        </>
    );
}
