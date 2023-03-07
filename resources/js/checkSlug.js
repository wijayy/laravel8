const title = document.querySelector("#title");
const slug = document.querySelector("#slug");

title.addEventListener("change", function () {
    fetch("/dashboard/post/checkSlug?title=" + title.value + "")
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
    console.log(data.slug);
});
