# EqualStreetNames City Template

If you want to replicate the EqualStreetNames project in your city, here is the how-to !

## Setup

1. Fork this repository

1. Find the *OpenStreetMap* relation of your city (example, [Brussels](https://www.openstreetmap.org/relation/54094))

1. Add the relation identifier in `config.php` (*example for Brussels*)

    ```diff
    - 'relationId' => 0,
    + 'relationId' => 54094,
    ```

1. Update the *Overpass* queries :

    `overpass/relation-full-json` (*example for Brussels*)

    ```diff
    - ( area["admin_level"=""]["wikidata"=""]; )->.a;
    + ( area["admin_level"="8"]["wikidata"="Q12994"]; )->.a;
    ```

    `overpass/way-full-json` (*example for Brussels*)

    ```diff
    - ( area["admin_level"=""]["wikidata"=""]; )->.a;
    + ( area["admin_level"="8"]["wikidata"="Q12994"]; )->.a;
    ```

1. Update the HTML files (replace `MyCity` by the name of your city in all the `index.html` files, add languages, ...)

## Integrate your city to the project

1. Let us know you're ready to add a new city to the project by [opening a new issue](https://github.com/EqualStreetNames/equalstreetnames/issues).

1. You have 2 options:

    1. Transfer your repository to the EqualStreetNames organization.

       If you choose to do so, you stay of course "owner" of the repository, we'll create a team for you (and anyone you want) that will have admin rights on your repository.  
       We'll help you maintain and manage your repository.  
       We'll also setup an automated data update (usually once a week) and automated deployment of the website (if you need it).

    1. Keep the ownership of your repository.

       We'll just link your repository as sub-module in the [`cities` folder](https://github.com/EqualStreetNames/equalstreetnames/tree/master/cities).  
       You'll have to maintain your repository, update the data, and the sub-module yourself.

## Run your city locally

1. Clone the main repository

    ```bash
    git clone https://github.com/EqualStreetNames/equalstreetnames.git
    ```

1. Copy/Link your repository in the `cities` folder of the main repository (`cities/my-country/my-city`).

1. Run the data update (in the root folder of the main repository)

    ```bash
    composer install
    composer run update-data -- --city=my-country/my-city
    ```

1. Run the website locally (in the root folder of the main repository)

    If you're still in the process of testing, you might need to add it to the `package.json` beforehand.

    ```diff
    + "serve:my-country:my-city": "parcel serve cities/my-country/my-city/html/index.html cities/my-country/my-city/html/*/index.html --global app --out-dir dist/my-country/my-city"
    ```

    ```bash
    npm install
    npm run serve:my-country:my-city
    ```

1. Open <http://localhost:1234/>
