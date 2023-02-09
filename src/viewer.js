const viewerId = document.getElementById("viewerId");

const params = new URLSearchParams(document.location.search);
const id = params.get("id");
console.log(id);
fetch("https://imdb-api.com/en/API/Trailer/k_w6sfh0om/" + id)
  .then((response) => response.json())
  .then((data) => {
    viewerId.src = data.linkEmbed;
  });
