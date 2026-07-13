document
    .getElementById('searchForm')
    .addEventListener('submit', function (event) {

        event.preventDefault();

        const formData =
            new FormData(this);

        fetch('api/jobs.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {

            document.getElementById('result')
                .innerHTML =
                'Job Created: ' +
                data.job_id;
        })
        .catch(error => {

            console.error(error);
        });
    });