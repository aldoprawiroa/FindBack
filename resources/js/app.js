const root = document.documentElement;
const themeToggle = document.querySelector('[data-theme-toggle]');

const updateThemeLabel = () => {
    if (!themeToggle) return;
    const dark = root.dataset.theme === 'dark';
    themeToggle.setAttribute('aria-pressed', String(dark));
    themeToggle.textContent = dark ? 'Mode terang' : 'Mode gelap';
};

updateThemeLabel();

window.addEventListener('storage', (event) => {
    if (event.key !== 'findback-theme' && event.key !== null) return;
    root.dataset.theme = event.newValue === 'dark' ? 'dark' : 'light';
    updateThemeLabel();
});

themeToggle?.addEventListener('click', () => {
    root.dataset.theme = root.dataset.theme === 'dark' ? 'light' : 'dark';
    try { 
        localStorage.setItem('findback-theme', root.dataset.theme); 
    } catch (_) { 
        /* Storage opsional */ 
    }
    updateThemeLabel();
});

const appMenu = document.querySelector('[data-app-menu]');
if (appMenu && typeof window.matchMedia === 'function') {
    appMenu.dataset.menuReady = 'true';
    const compact = window.matchMedia('(max-width: 850px)');
    const updateMenu = () => { appMenu.open = !compact.matches; };
    updateMenu();
    compact.addEventListener('change', updateMenu);
}