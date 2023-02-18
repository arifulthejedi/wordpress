===================>>Class RegisterTaxonomy<<==============
#this class can create cunstom taxonomy with rest route.

#create custom taxonomy
     $taxonomy = new RegisterTaxonomy($nameoftaxonomy,$pluralname,[$post_type],$description,$slugfortaxonomy);

#for enable rest route
    $taxonomy->create_rest_route();

localhost/nameoftaxonomy/taxonomy which retieve all content under that taxonomy(default 10 conent but customizable)

