document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    
    searchInput.addEventListener('input', function() {
        const query = this.value;
        
        if (query.length >= 3) {
            fetch('/search.php?q=' + encodeURIComponent(query))
                .then(response => response.json())
                .then(data => displayResults(data))
                .catch(error => console.error('Error:', error));
        } else {
            clearResults();
        }
    });

    function displayResults(results) {
        const resultsContainer = document.getElementById('search-results');
        resultsContainer.innerHTML = '';

        if (results.length > 0) {
            results.forEach(result => {
                const resultDiv = document.createElement('div');
                resultDiv.className = 'result';
                
                resultDiv.innerHTML = `
                    <h3>${result.name}</h3>
                    <p>${result.description}</p>
                    <span>Цена: ${result.price} руб.</span>
                `;
                
                resultDiv.addEventListener('click', () => {
                    window.location.href = `/tovar_page.php?id=${result.id}&table_name=${encodeURIComponent(searchInput.value)}`;
                });

                resultsContainer.appendChild(resultDiv);
            });
        } else {
            resultsContainer.innerHTML = '<p>Ничего не найдено</p>';
        }
    }

    function clearResults() {
        const resultsContainer = document.getElementById('search-results');
        resultsContainer.innerHTML = '';
    }
});
