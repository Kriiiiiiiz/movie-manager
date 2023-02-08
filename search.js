const btnGo = document.querySelector("#btnGo");
const searchInput = document.querySelector("#searchInput");

function search(query) {
  fetch("https://imdb-api.com/en/API/SearchMovie/k_w6sfh0om/" + query)
    .then((response) => response.json())
    .then((data) => {
      createResults(data);
    });

  function createResults(data) {
    data.results.forEach((item) => {
      const tableMovie = document.querySelector("#tableMovie");
      const trTableMovie = document.createElement("tr");

      const tdMovieId = document.createElement("td");
      tdMovieId.textContent = item.id;
      const tdMovieTitle = document.createElement("td");
      tdMovieTitle.textContent = item.title;
      const tdMovieTrailer = document.createElement("td");
      tdMovieTrailer.textContent = "";

      tableMovie.appendChild(trTableMovie);
      trTableMovie.appendChild(tdMovieId);
      trTableMovie.appendChild(tdMovieTitle);
      trTableMovie.appendChild(tdMovieTrailer);
      console.log(item.title);
    });
  }
}

btnGo.addEventListener("click", () => {
  search(searchInput.value);
});
