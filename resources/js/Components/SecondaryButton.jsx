export default function SecondaryButton({ type = 'button', className = '', disabled, children, ...props }) {
    return (
        <button
            {...props}
            type={type}
            className={
                `inline-flex items-center px-4 py-2 bg-tertiary border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-tertiary/40 focus:bg-tertiary/50 focus:outline-none focus:ring-2 focus:ring-tertiary/50 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 ${
                    disabled && 'opacity-25'
                } ` + className
            }
            disabled={disabled}
        >
            {children}
        </button>
    );
}
