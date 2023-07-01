#!/usr/bin/env bash

if [ $# -eq 0 ]
  then
    echo "No Component name supplied"
    exit;
fi

# accept the name of the component
NAME=$1

mkdir ./Components/$NAME
touch ./Components/$NAME/functions.php
touch ./Components/$NAME/index.twig
touch ./Components/$NAME/_style.scss
touch ./Components/$NAME/_media.scss
touch ./Components/$NAME/script.js