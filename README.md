# Battle of dragons

Just a silly app you can make for practicing OOP programming with PHP.

# Rough roadmap

+ In coming versions, the dragon objects could be initialised by the web user via a form.
+ A bit of colour and life to the interface wouldn't be a bad idea.
+ Maybe dragons can fall in love and form alliances against more hostile dragons.

# corrections and stuff to add

+ establish const array with values: colors and powers
+ define function that picks a random value from the constant at the time of creation of object
+ in setRandomColor() we we'll find: $randomIndex = rand(patatitatata); $this->couleur = self::COLORS[$randomIndex]; where COLORS is the const
+ Might be interesting: add a getRandomDamage() function in the class definition, pick a random value but depends partly on the size of the dragon. Plus grand -> plus puissant.
