--INSERT INTO COUNTRY (COUNTRYDESCRIPTION) VALUES ('India');
--INSERT INTO COUNTRY (COUNTRYDESCRIPTION) VALUES ('Jordan');
--INSERT INTO COUNTRY (COUNTRYDESCRIPTION) VALUES ('Mexico');
--INSERT INTO COUNTRY (COUNTRYDESCRIPTION) VALUES ('Vietnam');
--************************ Indian 
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD('/opt/lampp/htdocs/img/Biryani.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'India'), 
 'Biryani'
);
--**********************
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD ('/opt/lampp/htdocs/img/ChholeBhature.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'India'), 
 'ChholeBhature'
);
--**********************
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD ('/opt/lampp/htdocs/img/Dosa.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'India'), 
 'Dosa'
);
--**********************
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD ('/opt/lampp/htdocs/img/GarlicButterChicken.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'India'),
'GarlicButterChicken'
);

--********************** Vietnamese
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD ('/opt/lampp/htdocs/img/Xoiladia.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Vietnam'), 
 'Xoiladia'
);
--**********************  
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD('/opt/lampp/htdocs/img/comtam.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Vietnam'), 
 'comtam'
);
--**********************
 FILE_LOAD('/opt/lampp/htdocs/img/bunbohue.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Vietnam'), 
 'bunbohue'
);
--**********************
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD('/opt/lampp/htdocs/img/banhmi.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Vietnam'), 
 'banhmi'
);
--**********************
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD('/opt/lampp/htdocs/img/pho.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Vietnam'), 
 'pho'
);
--**********************
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD ('/opt/lampp/htdocs/img/xoiladua.JPG'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Jordan'), 
 'xoiladua'
);

--********************** Jordanian 
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD('/opt/lampp/htdocs/img/flafel.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Jordan'), 
 'Falafel'
);
--**********************
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD('/opt/lampp/htdocs/img/Mansaf.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Jordan'), 
 'Mansaf'
);
--**********************
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD('/opt/lampp/htdocs/img/tabouleh.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Jordan'), 
 'Tabouleh'
);
--**********************
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD('/opt/lampp/htdocs/img/nightingale.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Jordan'), 
 'NightingaleNest'
);

--************* Mexican
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD ('/opt/lampp/htdocs/img/Torta.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Mexico'), 
 'Torta'
);
--**********************
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD('/opt/lampp/htdocs/img/Tamales.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Mexico'), 
 'Tamales'
);
--**********************
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD('/opt/lampp/htdocs/img/Tacos.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Mexico'), 
 'Tacos'
);
--**********************
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD('/opt/lampp/htdocs/img/Pozole.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Mexico'), 
 'Pozole'
);
--**********************
INSERT INTO IMAGES (IMAGE, COUNTRYID, IMAGELABEL) VALUES
(
 FILE_LOAD('/opt/lampp/htdocs/img/Mole.jpg'), 
 (SELECT COUNTRYID FROM COUNTRY WHERE COUNTRYDESCRIPTION = 'Mexico'), 
 'Mole'
);
--**********************


-- Ingredient 

--******************** Indian
INSERT INTO MEALINGREDIENT (Description) VALUES --Biryani
(
 'Long-grained rice flavored with exotic spices such as saffron is layered with lamb, chicken, fish, or vegetables cooked in a thick gravy. The dish is then covered, its lid sealed on with dough and the biryani is cooked on a low flame.', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL = 'Biryani') 
);
--***********************
INSERT INTO MEALINGREDIENT (Description) VALUES -- ChholeBhature 
(
 ' Chicken is marinated for several hours in a lemon juice, yogurt and spice mixture. The spices may include garam masala, ginger, garlic, pepper, coriander, cumin, turmeric, and chili.', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL = 'ChholeBhature') 
);
--***********************
INSERT INTO MEALINGREDIENT (Description) VALUES -- Dosa 
(
 'Dosa is high in carbohydrates and contains no added sugars or saturated fats. As its key ingredients are rice and black gram, it is also a good source of protein.[10] The fermentation process increases the vitamin B and vitamin C content.', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL = 'Dosa') 
);
--***********************
INSERT INTO MEALINGREDIENT (Description) VALUES --GarlicButterChicken
(
 'This Punjabi dish is a combination of spicy white chickpeas and bhatura, a fried bread made from soft wheat flour', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL = 'GarlicButterChicken') 
);


--*************** Mexican 
INSERT INTO MEALINGREDIENT (Description) VALUES
(
 'The traditional torta	usually made with chicken,steak	or hamalong with avocado and mixed veggies.', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL = 'Torta') 
);
--***********************
INSERT INTO MEALINGREDIENT (Description) VALUES
(
 'Very popular and savory tamales made out of corn dough and stuffed with steak chicken cheese or peppers.', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL = 'Tamales') 
);
--***********************
INSERT INTO MEALINGREDIENT (Description) VALUES
(
 'Traditional plate made with a broth that is blended from peppers garlic onion tomatoes. Contains any choice of meat.', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL = 'Pozole') 
);
--***********************
INSERT INTO MEALINGREDIENT (Description) VALUES
(
 'Mole is made from a mixture of peppers and chocolate usually contains chicken and rice  along with tortilla.', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL = 'Mole') 
);




--*****************Vietnamese 
INSERT INTO MEALINGREDIENT (Description) VALUES
(
 'pandan sweet stucky  rice dessert', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL =  'xoiladua') 
);
--***********************

INSERT INTO MEALINGREDIENT (Description) VALUES
(
 'cosists of fracrued rice grain, usually served with grilled port and a shredded pork', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL = 'comtam') 
);
--***********************
INSERT INTO MEALINGREDIENT (Description) VALUES
(
 'consist of vermiceli and beef', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL = 'bunbohue' ) 
);
--***********************
INSERT INTO MEALINGREDIENT (Description) VALUES
(
 'Vietnamese version of subwar sandwiches', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL = 'banhmi') 
);
--***********************
INSERT INTO MEALINGREDIENT (Description) VALUES
(
 'consist of broth, rice noodle, herb, and meat', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL =  'pho') 
);


--********************Jordanian
INSERT INTO MEALINGREDIENT (Description) VALUES
(
 'ground beans, ground check peas, nutmeg, onions, scallions and spices like parsley, garlic, cumin, cilantro and coriander', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL =  'Falafel') 
);
--***********************
INSERT INTO MEALINGREDIENT (Description) VALUES
(
 'Lamb meat, basmati rice, pine nuts, walnut, parsley, yougert soup', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL =  'Mansaf' ) 
);
--***********************
INSERT INTO MEALINGREDIENT (Description) VALUES
(
 'Bulgur wheat, olive oil, parsley, mint, tomatoes, pickle size cucumber, lemone juice ', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL =  'Tabouleh') 
);
--***********************
INSERT INTO MEALINGREDIENT (Description) VALUES
(
 'Butter, milk, semonila, salt, Orange blosom syrup, almond, pistachios,shredded Phyllo dough', 
  (SELECT IMAGEID FROM IMAGES WHERE IMAGELABEL = 'NightingaleNest') 
);


