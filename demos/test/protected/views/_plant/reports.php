<h3>List of plants grouped by types:</h3>
<?php foreach ($plant_types as $plant_type) {
    if(!empty($plant_type->plants))
    { echo $plant_type->name; ?>
        <ul>
            <?php foreach ($plant_type->plants as $plant) {?>
                <li><?=$plant_type->name . ' ' . $plant->current_growth?></li>
            <?php } ?>
        </ul>
    <?php }
} ?>

<h3>List of mature plants grouped by volume descending:</h3>
<?php foreach ($mature_plants_grouped_by_volume_desc as $plant) {?>
    <ul>
        <li><?=$plant->plant_type->name . '  <b>volume:</b> ' . $plant->plant_type->volume?></li>
    </ul>
<?php } ?>

<h3>List of warehouses including percentage of population:</h3>
<?php foreach ($warehouses as $warehouse) {?>
    <ul>
        <li><?=$warehouse->name . '  <b>volume:</b> ' . $warehouse->volume . ' <b>busy:</b> ' . $warehouse->getBusyInPercent() . ' %'?></li>
    </ul>
<?php } ?>

<h3>List of mature plants grouped by warehouse where plant resides:</h3>
<?php foreach ($warehouses as $warehouse) {
    if(!empty($warehouse->mature_plants))
    { echo $warehouse->name; ?>
    <ul>
        <?php foreach ($warehouse->mature_plants as $mature_plant) { ?>
            <li><?=$mature_plant->plant_type->name . '  <b>volume:</b> ' . $mature_plant->plant_type->volume?></li>
        <?php } ?>
    </ul>
<?php 
    }
} ?>

<h3>List of mature plants that are not stored in warehouse:</h3>
<?php foreach ($mature_plants_not_in_warehouse as $mature_plant_not_in_warehouse) { ?>
    <ul>
        <li><?=$mature_plant_not_in_warehouse->plant_type->name . '  <b>volume:</b> ' . $mature_plant_not_in_warehouse->plant_type->volume?></li>
    </ul>
<?php } ?>

<h3>List of plants grouped by current growth descending:</h3>
<?php foreach ($plants_order_by_current_growth as $plant_order_by_current_growth) { ?>
    <ul>
        <li><?=$plant_order_by_current_growth->plant_type->name . '  <b>current growth:</b> ' . $plant_order_by_current_growth->current_growth?></li>
    </ul>
<?php } ?>