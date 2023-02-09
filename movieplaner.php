<!DOCTYPE html>
<html ng-app="myApp">
  <head lang="en">
    <meta charset="UTF-8" />
    
    <link
      rel="stylesheet"
      href="bower_components/bootstrap/dist/css/bootstrap.min.css"
    />
    <title>Movie Planet</title>
  </head>
  <body ng-controller="MyController">
    <nav class="navbar navbar-default">
      <div class="container container-fluid">
        <ul class="nav navbar-nav">
          <li class="navbar-brand">
            <span class="glyphicon glyphicon-film"></span>
          </li>
          <li class="active"><a href="">Movie Manager</a></li>
          <li><a href="Search.html">Search to the Movie Manager</a></li>
        </ul>
      </div>
    </nav>

    <div class="container">
        <label>Search </label>
        <input
          type="text"
          ng-model="inpTitle"
          placeholder="title"
          required
          id="searchInput"
        />
        <button type="submit" id="btnGo">GO!</button>

      <hr />

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Trailer</th>
          </tr>
        </thead>
        <tbody id="tableMovie">
        </tbody>
      </table>
    </div>

    <script src='./src/search.js'></script>
</html>
