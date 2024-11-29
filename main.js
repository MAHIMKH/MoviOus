
document.addEventListener('DOMContentLoaded', function () {
            const searchBar = document.getElementById('searchBar');
            const suggestionsBox = document.getElementById('suggestions');
    
            const suggestions = ['Naruto', 'Jujutsu Kaisen','One punch man','Dragon ball Z'];
    
           
            searchBar.addEventListener('focus', function () {
                suggestionsBox.innerHTML = '';
    
                suggestions.forEach(suggestion => {
                    const suggestionElement = document.createElement('a');
                    suggestionElement.href = '#';
                    suggestionElement.textContent = suggestion;
                    suggestionsBox.appendChild(suggestionElement);
                });
    
                suggestionsBox.style.display = 'block';
            });
    
           
            document.addEventListener('click', function (event) {
                if (!searchBar.contains(event.target) && !suggestionsBox.contains(event.target)) {
                    suggestionsBox.style.display = 'none';
                }
            });
});
