function initializeTomSelect(url, selectElement) {
    fetch(url)
        .then(response => response.json())
        .then(initialResults => {
            var assignedUserSelect = new TomSelect(selectElement, {
                options: initialResults,
                valueField: 'id',
                labelField: 'name',
                searchField: 'name',
                maxItems: 1,
                create: false,
                load: function(query, callback) {
                    // Implement your own logic to fetch data based on the query
                    fetch(`${url}?q=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            callback(data);
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                            callback([]);
                        });
                }
            });
        })
        .catch(error => {
            console.error('Error fetching initial data:', error);
        });
}