
document.addEventListener("DOMContentLoaded", function () {
    const element = document.querySelectorAll(".delete");
    element.forEach(function (elem, key) {
        elem.addEventListener('click', function () {
            const id = this.getAttribute('rel');
            const url = this.getAttribute('url');
            if (confirm("Удалить запись?")) {
                send(url + id).then(() => {
                    location.reload();
                })
            }
        });
    });

});

async function send(url) {
    let response = await fetch(url, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                .getAttribute('content')
        }
    })
    let result = await response.json();
    return result.ok;
}