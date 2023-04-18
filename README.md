# workouts

## getRandWorkouts
write a php webpage that connects to a mssql server. The database has a table named TBL_WORKOUTS. At the bottom of this message is a list of columns belonging to TBL_WORKOUTS. The webpage needs to pull six random exercises from this table. The exercises can be filter by the user through a GET parameter on the following columns: WO_MUSCLE_GP,  WO_MUSCLE_SGP, WO_LEVEL, WO_ULC, WO_PUSH_PULL, WO_MODALITY, WO_JOIN and WO_EQUIPMENT. return a json file

* WO_ID
* WO_NAME
* WO_DESC
* WO_NOTES
* WO_MUSCLE_GP
* WO_MUSCLE_SGP
* WO_LEVEL
* WO_ULC
* WO_PUSH_PULL
* WO_MODALITY
* WO_JOINT
* WO_EQUIPMENT
* WO_COUNT_TYPE
* WO_COUNT_INST

## getWorkoutFilters
write a php function that accepts two parameters. First is the ID of an existing HTML dropdown box. The second is the column name in the mysql TBL_WORKOUTS table. The function should connect to the mysql server, query a list of distinct values in the table, and put them into the dropdown box. 
Here's an example PHP function that accepts two parameters: the ID of an existing HTML dropdown box and the column name in the TBL_WORKOUTS table. The function connects to the MySQL server, queries the distinct values in the specified column, and populates the dropdown box with those values.
To use this function in your PHP script, simply call it with the ID of the dropdown box and the column name as arguments:
```
populateDropdown('muscle-group', 'WO_MUSCLE_GP');
populateDropdown('equipment', 'WO_EQUIPMENT');
```
This will generate two dropdown boxes with the distinct muscle groups and equipment from the TBL_WORKOUTS table, respectively. The first argument is the ID of the dropdown box, and the second argument is the column name in the table.
