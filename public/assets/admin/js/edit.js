function showColumns(language) {
    const titleColumns = document.querySelectorAll(`.lang-title[data-lang="${language}"]`);
    const positionColumns = document.querySelectorAll(`.lang-position-${language}`);

    titleColumns.forEach(column => {
        column.style.display = 'table-cell';
    });

    positionColumns.forEach(column => {
        column.style.display = 'table-cell';
    });
}

document.getElementById('yourSelectElement').addEventListener('change', function() {
    const selectedLanguage = this.value;
    showColumns(selectedLanguage);
});

const initialLanguage = 'en';
showColumns(initialLanguage);
