<?php

// $conn = mysqli_connect('localhost', 'marine_species', 'Generate12@', 'marine_species') or die(mysqli_error($conn));
$conn = mysqli_connect('localhost', 'cms22', 'Generate2021@@', 'cms_gis') or die(mysqli_error($conn));
?>

<style>
    .cards-container {
        height: 80vh !important;
        overflow: auto;
        width: 100% !important;
        background: #f3f3f3;
        padding: 1em 3em;
        display: flex !important;
        flex-direction: column !important;
    }

    .custom-card {
        width: 100%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        display: flex;
        justify-content: flex-start;
        height: 50vh;
        margin-bottom: 2em;
        background: #fff;

    }

    .card-images {
        height: 50vh;
        overflow: auto;
        width: 50%;
        display: flex;
        /* clip-path: polygon(5% 0%, 100% 0%, 95% 100%, 0% 100%); */
        /* clip-path: polygon(5% 0%, 100% 0%, 95% 100%, 0% 100%); */
        clip-path: polygon(0% 0%, 75% 0%, 100% 50%, 75% 100%, 0% 100%);


    }

    .card-img {
        height: 50vh !important;
        transition: all 0.3s;
        width: 100% !important;
    }

    .card-img:active .card-images {
        width: 100% !important;
        border: 1px solid red !important;
    }

    .card-img:active {
        transform: scale(2);
    }

    .card-content {
        width: 50%;
        padding: 2.5em;

    }

    .marine-species-name {
        color: rgb(0, 130, 224);
    }
</style>