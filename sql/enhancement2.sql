--query 1
INSERT INTO clients
	(clientFirstname,clientLastname,clientEmail,clientPassword,comment)
    VALUES
    ("Tony","Stark","tony@starkent.com","Iam1ronM@n","I am the real Ironman");

--query 2
UPDATE clients
SET clientLevel = 3
WHERE clientFirstname = "Tony" AND clientLastname="Stark"
--query 3
UPDATE inventory
SET invDescription = replace (invDescription, "small", "spacius")
WHERE invMake = "GM" AND invModel="Hummer"
--query 4
SELECT inventory.invModel, carclassification.classificationName , inventory.classificationId
FROM inventory
INNER JOIN carclassification
ON inventory.classificationId=carclassification.classificationId
WHERE inventory.classificationId=1
--query 5
DELETE 
FROM inventory
WHERE invMake="Jeep" and invModel="Wrangler"
--query 6
UPDATE inventory
SET 
	invImage = concat("/phpmotors",invImage),
    invThumbnail=concat("/phpmotors",invThumbnail)
