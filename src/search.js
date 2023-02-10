const btnGo = document.querySelector("#btnGo");
const searchInput = document.querySelector("#searchInput");

function search(query) {
  fetch("https://imdb-api.com/en/API/SearchMovie/k_j118mitw/" + query)
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      createResults(data);
    });

  function createResults(data) {
    const tableMovie = document.querySelector("#tableMovie");

    while (tableMovie.firstChild) {
      tableMovie.removeChild(tableMovie.lastChild);
    }
    data.results.forEach((item) => {
      const trTableMovie = document.createElement("tr");

      const tdMovieId = document.createElement("td");
      tdMovieId.textContent = item.id;
      const tdMovieTitle = document.createElement("td");
      tdMovieTitle.textContent = item.title;
      const tdMovieTrailer = document.createElement("td");
      const image = document.createElement("img");
      image.src = item.image;
      image.className = "imageSearch";
      const a = document.createElement("a");
      a.href = "./trailerviewer.php?id=" + item.id;
      a.textContent = "viewtrailer";

      tableMovie.appendChild(trTableMovie);
      trTableMovie.appendChild(tdMovieId);
      trTableMovie.appendChild(tdMovieTitle);
      trTableMovie.appendChild(tdMovieTrailer);
      tdMovieTrailer.appendChild(a);
      trTableMovie.appendChild(image);
    });
  }
}

btnGo.addEventListener("click", () => {
  search(searchInput.value);
});
