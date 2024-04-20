console.log('Le JS se charge.');

const watchFiltersTopics = () => {
    console.log('La fonction se lance.')
    document.addEventListener('DOMContentLoaded', function() {
        const filtersForm = document.querySelectorAll('#filters_form');
        const filtersButton = document.querySelector('#js_filters_button');

        console.log(filtersForm);
        console.log(filtersButton);

        if (filtersForm.length > 0) {
            filtersButton.addEventListener('click', () => {
                filtersForm[0].classList.toggle('hide');
                filtersForm[0].classList.toggle('show-flex');
            });
        }

        document.querySelectorAll('#filters_form input').forEach(input => {
            console.log('Boucle sur les inputs.')
            input.addEventListener('change', () => {
                console.log('Changement détecté.')
                const data = new FormData(filtersForm[0]);
                console.log(data);
                const Params = new URLSearchParams(data);
                console.log(Params);
                const url = new URL(window.location.href);
                console.log(url);
                fetch(url.pathname + "?" + Params.toString() + "&ajax=1", {
                    headers: {
                        'x-requested-with': 'XMLHttpRequest'
                    }
                }).then(response => response.json()
                ).then(data => {
                    console.log('Réponse reçue.');
                    console.log(data.content);
                    const filteredTopics = document.querySelector('#filtered_topics');
                    console.log(filteredTopics);
                    filteredTopics.innerHTML = data.content;
                    history.pushState({}, null, url.pathname + "?" + Params.toString());
                }).catch(error => alert(error));
            });
        });
    });
}

watchFiltersTopics();
