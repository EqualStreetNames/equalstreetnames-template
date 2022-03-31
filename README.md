# EqualStreetNames City Template

If you want to replicate the EqualStreetNames project in your city, here is the how-to !

## Setup

1. Click on the "Use this template" button above

1. Update the *Overpass* queries :

    `overpass/relation-full-json` (*example for Brussels, Belgium*)

    ```diff
    - ( area["admin_level"=""]["wikidata"=""]; )->.a;
    + ( area["admin_level"="4"]["wikidata"="Q240"]; )->.a;
    ```

    `overpass/way-full-json` (*example for Brussels, Belgium*)

    ```diff
    - ( area["admin_level"=""]["wikidata"=""]; )->.a;
    + ( area["admin_level"="4"]["wikidata"="Q240"]; )->.a;
    ```

1. Find the *OpenStreetMap* relation of your city (example, [Brussels, Belgium](https://www.openstreetmap.org/relation/54094))

1. Update `config.php` configuration file

    1. **REQUIRED:** Add relation identifier (*example for Brussels, Belgium*).

        ```diff
        - 'relationId' => 0,
        + 'relationId' => 54094,
        ```

    1. *Optional:* Choose languages in which you want to extract Wiki informations with `languages` (English `en` by default).

    1. *Optional:* You can exclude ways or relations by adding the ways identifier in `exclude.way` and adding the relations identifier in `exclude.relation`.

    1. *Optional:* You can manually assign a gender to a way or a relation by adding the ways identifier and its gender in `gender.way` and adding the relations identifier and its gender in `gender.relation`. You can also use `data.csv` file to assign gender (and details) to a way or relation (see below).

    1. *Optional:* You can change the Wikidata instances that will be counted as "a person" with `instances`.

1. You can link information to a relation or way using a `data.csv` CSV file (see [Brussels, Belgium CSV file](https://github.com/EqualStreetNames/equalstreetnames-brussels/blob/master/data.csv))

    Structure:

    - `type`: *OpenStreetMap* object type (relation/way)
    - `id`: *OpenStreetMap* object identifier
    - `name`: *OpenStreetMap* street name
    - `gender`: Gender
    - `person`: Name of the person
    - `description`: Description of the person

1. Update the HTML files (replace `MyCity` by the name of your city in **all** `index.html` files, add languages, ...).

    (*example for Brussels, Belgium*)

    ```diff
    - <title>EqualStreetNames.MyCity</title>
    + <title>EqualStreetNames.Brussels</title>

    - <div id="loader-title">EqualStreetNames.MyCity</div>
    + <div id="loader-title">EqualStreetNames.Brussels</div>

    - <a class="navbar-brand" href="#">EqualStreetNames.MyCity</a>
    + <a class="navbar-brand" href="#">EqualStreetNames.Brussels</a>
    ```

1. Optionally you can change the style using `data-style` attribute, it can be a Mapbox pre-defined style (see [API Reference](https://docs.mapbox.com/mapbox-gl-js/api/#map)) or your custom style (see [Style Specification](https://docs.mapbox.com/mapbox-gl-js/style-spec/)).

    ```diff
    - <div id="map"></div>;
    + <div id="map" data-style="mapbox://styles/mapbox/dark-v10"></div>;
    ```


## Integrate your city to the project

1. Let us know you're ready to add a new city to the project by [opening a new issue](https://github.com/EqualStreetNames/equalstreetnames/issues).

1. You have 2 options:

    1. Transfer your repository to the EqualStreetNames organization.

       If you choose to do so, you stay of course "owner" of the repository, we'll create a team for you (and anyone you want) that will have admin rights on your repository.  
       We'll help you maintain and manage your repository.  
       We'll also setup an automated data update (once a month) and automated deployment of the website (if you need it). If you want more regular updates, you will need to create an `ACCESS_TOKEN` in your repository secrets with your [GitHub access token](https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/creating-a-personal-access-token).

       For the automated deployment, you will need to create a `MAPBOX_TOKEN` in your repository secrets (see [Mapbox documentation](https://docs.mapbox.com/help/how-mapbox-works/access-tokens/)).

    1. Keep the ownership of your repository.

       We'll just link your repository as sub-module in the [`cities` folder](https://github.com/EqualStreetNames/equalstreetnames/tree/master/cities).  
       You'll have to maintain your repository, update the data, and the sub-module yourself.

## Run your city locally

1. Clone the main repository

    ```cmd
    git clone https://github.com/EqualStreetNames/equalstreetnames.git
    ```

1. Copy/Link your repository in the `cities` folder of the main repository (`cities/my-country/my-city`).

1. Run the data update (in the `process` folder of the main repository)

    ```cmd
    cd process/
    composer install
    composer run update-data -- --city=my-country/my-city
    ```

1. Run the website locally (in the root folder of the main repository)

    1. Add your city in the `"scripts"` section of the `website/package.json` file

        ```diff
        + "build:my-country:my-city": "node build.js -c my-country/my-city"
        ```

    1. Create a [Mapbox token](https://docs.mapbox.com/help/how-mapbox-works/access-tokens/)

    1. Create a file named `.env` in the `website` directory of the project

    1. Add the following line to the `.env` file: `MAPBOX_TOKEN=[your Mapbox token]` replacing `[your Mapbox token]` with the token you created

    1. Install JavaScript dependencies and run it (in the `website` folder of the main repository)

        ```cmd
        cd website/
        npm install
        npm run build:my-country:my-city -- --serve
        ```

1. Open <http://localhost:1234/>
