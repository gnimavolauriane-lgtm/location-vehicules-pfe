document.addEventListener('DOMContentLoaded', function () {
   i18next
  .use(i18nextHttpBackend)
  .use(i18nextBrowserLanguageDetector)
  .init({
    fallbackLng: 'fr',
    debug: true,
    backend: {
      loadPath: '/PFE1/locale/{{lng}}/traduction.json' 
    },
    interpolation: {
      escapeValue: false
    },
    lng: 'fr', // Définir la langue 
  }, function(err, t) {
    updateContent();
  });


  // Liste des langues disponibles
  const languages = ['fr', 'en', 'ma'];

  // Met à jour le contenu en fonction de la langue active
  function updateContent() {
    document.querySelectorAll('[data-i18n]').forEach(el => {
      const key = el.getAttribute('data-i18n');
      el.innerHTML = i18next.t(key);
    });

    // Met à jour l'affichage du petit carré
    const languageSwitcher = document.getElementById('language-switcher');
    if (languageSwitcher) {
      languageSwitcher.textContent = i18next.language.toUpperCase();
    } else {
      console.warn('Language switcher not found!');
    }
  }

  // Clique sur le petit carré → change de langue
  const languageSwitcher = document.getElementById('language-switcher');
  if (languageSwitcher) {
    languageSwitcher.addEventListener('click', () => {
      const current = i18next.language;
      const nextIndex = (languages.indexOf(current) + 1) % languages.length;
      const nextLang = languages[nextIndex];

      console.log(`Changing language from ${current} to ${nextLang}`);  // Debugging

      i18next.changeLanguage(nextLang, updateContent);
    });
  } else {
    console.warn('Language switcher element not found!');
  }
});
