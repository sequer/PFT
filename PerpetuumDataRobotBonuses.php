<?php

$robotBonuses = array(
	
	'Arbalest' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Falloff', 'bonus' => 0.05, 'apply' => 'Turrets'),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Light magnetic weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Light magnetic weapons'),
		array('extension' => 'Basic robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	'Arbalest Mk2' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Falloff', 'bonus' => 0.05, 'apply' => 'Turrets'),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Light magnetic weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Damage',  'bonus' => 0.01, 'apply' => 'Weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Light magnetic weapons'),
		array('extension' => 'Basic robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	'Arbalest prototype' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Falloff', 'bonus' => 0.05, 'apply' => 'Turrets'),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Light magnetic weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Light magnetic weapons'),
		array('extension' => 'Basic robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	
	'Argano' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Basic robotics', 'parameter' => 'Mined amount',  'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvester modules'),
		array('extension' => 'Basic robotics', 'parameter' => 'Geoscanner accuracy', 'bonus' => 0.05, 'apply' => 'Geoscanners')
	),
	'Argano Mk2' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Basic robotics', 'parameter' => 'Mined amount',  'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Industrial robot control', 'parameter' => 'Mined amount',  'bonus' => 0.01, 'apply' => 'Miner modules'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvester modules'),
		array('extension' => 'Basic robotics', 'parameter' => 'Geoscanner accuracy', 'bonus' => 0.05, 'apply' => 'Geoscanners')
	),
	'Argano prototype' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Basic robotics', 'parameter' => 'Mined amount',  'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvester modules'),
		array('extension' => 'Basic robotics', 'parameter' => 'Geoscanner accuracy', 'bonus' => 0.05, 'apply' => 'Geoscanners')
	),
	
	'Arkhe' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Hit dispersion', 'bonus' => 0.02, 'apply' => 'Weapons'),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage',  'bonus' => 0.02, 'apply' => 'Light firearms'),
		array('extension' => 'Basic robotics', 'parameter' => 'Repair', 'bonus' => 0.02, 'apply' => 'Armor repair amount bonus')
	),
	'Arkhe Mk2' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Hit dispersion', 'bonus' => 0.03, 'apply' => 'Weapons'),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage',  'bonus' => 0.03, 'apply' => 'Light firearms'),
		array('extension' => 'Basic robotics', 'parameter' => 'Repair', 'bonus' => 0.03, 'apply' => 'Armor repair amount bonus')
	),
	
	'Artemis' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Critical hit chance', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Medium laser weapons'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Laser turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	'Artemis Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Critical hit chance', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Medium laser weapons'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Accumulator capacity', 'bonus' => 0.01),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Laser turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	'Artemis prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Critical hit chance', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Medium laser weapons'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Laser turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	
	'Baphomet' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Critical hit chance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Light lasers'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Laser turrets'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator capacity', 'bonus' => 0.05)
	),
	'Baphomet Mk2' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Critical hit chance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Light lasers'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Turrets'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Laser turrets'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator capacity', 'bonus' => 0.05)
	),
	'Baphomet prototype' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Critical hit chance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Light lasers'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Laser turrets'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator capacity', 'bonus' => 0.05)
	),
	
	'Cameleon' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'EW strength', 'bonus' => 0.05, 'apply' => 'Electronic warfare'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage',  'bonus' => 0.05, 'apply' => 'ECMs'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage',  'bonus' => 0.05, 'apply' => 'Demobilizers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Basic robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	'Cameleon Mk2' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'EW strength', 'bonus' => 0.05, 'apply' => 'Electronic warfare'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage',  'bonus' => 0.05, 'apply' => 'ECMs'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage',  'bonus' => 0.05, 'apply' => 'Demobilizers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Optimal range', 'bonus' => 0.02, 'apply' => 'Electronic warfare'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Basic robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	'Cameleon prototype' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'EW strength', 'bonus' => 0.05, 'apply' => 'Electronic warfare'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage',  'bonus' => 0.05, 'apply' => 'ECMs'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage',  'bonus' => 0.05, 'apply' => 'Demobilizers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Basic robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	
	'Castel' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Locking time', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Light missile launchers'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Light missile launchers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator recharge time', 'bonus' => 0.05),
	),
	'Castel Mk2' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Locking time', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Light missile launchers'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Accumulator capacity', 'bonus' => 0.01),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Light missile launchers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator recharge time', 'bonus' => 0.05),
	),
	'Castel prototype' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Locking time', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Light missile launchers'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Light missile launchers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator recharge time', 'bonus' => 0.05),
	),
	
	'Gargoyle' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Harvested amount', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05,'apply' => 'Terraformers'),
	),
	'Gargoyle Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Harvested amount', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Industrial robot control', 'parameter' => 'Harvested amount', 'bonus' => 0.01, 'apply' => 'Harvesters'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05,'apply' => 'Terraformers'),
	),
	'Gargoyle prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Harvested amount', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05,'apply' => 'Terraformers'),
	),
	
	'Gropho' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Locking time', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Medium missile launchers'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Ballistics'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Shield absorption', 'bonus' => 0.05, 'apply' => 'Shield generators'),
	),
	'Gropho Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Locking time', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Medium missile launchers'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Damage', 'bonus' => 0.01, 'apply' => 'Weapons'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Ballistics'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Shield absorption', 'bonus' => 0.05, 'apply' => 'Shield generators'),
	),
	'Gropho prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Locking time', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Medium missile launchers'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Ballistics'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Shield absorption', 'bonus' => 0.05, 'apply' => 'Shield generators'),
	),
	
	'Ictus' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Energy neutralizers'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Energy drainers'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Neutralized energy', 'bonus' => 0.08, 'apply' => 'Energy neutralizers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Shield absorption', 'bonus' => 0.02, 'apply' => 'Shield generators'),
	),
	'Ictus Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Energy neutralizers'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Energy drainers'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Neutralized energy', 'bonus' => 0.08, 'apply' => 'Energy neutralizers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Optimal range', 'bonus' => 0.02, 'apply' => 'Energy neutralizers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Optimal range', 'bonus' => 0.02, 'apply' => 'Energy drainers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Shield absorption', 'bonus' => 0.02, 'apply' => 'Shield generators'),
	),
	'Ictus prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Energy neutralizers'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Energy drainers'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Neutralized energy', 'bonus' => 0.08, 'apply' => 'Energy neutralizers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Shield absorption', 'bonus' => 0.02, 'apply' => 'Shield generators'),
	),
	
	'Intakt' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Locking range', 'bonus' => 0.02, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Basic robotics', 'parameter' => 'Locking time', 'bonus' => 0.03, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'Demobilizers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'ECMs'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	'Intakt Mk2' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Locking range', 'bonus' => 0.02, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Basic robotics', 'parameter' => 'Locking time', 'bonus' => 0.03, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'Demobilizers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'ECMs'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Optimal range', 'bonus' => 0.02, 'apply' => 'Electronic warfare'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	'Intakt prototype' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Locking range', 'bonus' => 0.02, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Basic robotics', 'parameter' => 'Locking time', 'bonus' => 0.03, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'Demobilizers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'ECMs'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	
	'Kain' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Falloff', 'bonus' => 0.05, 'apply' => 'Turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Medium magnetic weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Magnetic weapon turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	'Kain Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Falloff', 'bonus' => 0.05, 'apply' => 'Turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Medium magnetic weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Accumulator capacity', 'bonus' => 0.01),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Magnetic weapon turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	'Kain prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Falloff', 'bonus' => 0.05, 'apply' => 'Turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Medium magnetic weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Magnetic weapon turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	
	'Laird' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Basic robotics', 'parameter' => 'Harvested amount',  'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Basic robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Terraformers')
	),
	'Laird Mk2' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Basic robotics', 'parameter' => 'Harvested amount',  'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Industrial robot control', 'parameter' => 'Harvested amount', 'bonus' => 0.01, 'apply' => 'Harvesters'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Basic robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Terraformers')
	),
	'Laird prototype' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Basic robotics', 'parameter' => 'Harvested amount',  'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Basic robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Terraformers')
	),
	
	'Lithus' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator capacity', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05),
		array('extension' => 'Industrial robot control', 'parameter' => 'Armor', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Shield absorption', 'bonus' => 0.05, 'apply' => 'Shield generators')
	),
	'Lithus Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator capacity', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05),
		array('extension' => 'Industrial robot control', 'parameter' => 'Demobilizer resistance', 'bonus' => 0.01),
		array('extension' => 'Industrial robot control', 'parameter' => 'Armor', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Shield absorption', 'bonus' => 0.05, 'apply' => 'Shield generators')
	),
	'Lithus prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator capacity', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05),
		array('extension' => 'Industrial robot control', 'parameter' => 'Armor', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Shield absorption', 'bonus' => 0.05, 'apply' => 'Shield generators')
	),
	
	'Mesmer' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Falloff', 'bonus' => 0.05, 'apply' => 'Turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Medium magnetic weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Magnetic weapon turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	'Mesmer Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Falloff', 'bonus' => 0.05, 'apply' => 'Turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Medium magnetic weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Damage', 'bonus' => 0.01, 'apply' => 'Weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Magnetic weapon turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	'Mesmer prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Falloff', 'bonus' => 0.05, 'apply' => 'Turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Medium magnetic weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Magnetic weapon turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	
	'Prometheus' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Critical hit chance', 'bonus' => 0.01),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Light lasers'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Laser turrets'),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	'Prometheus Mk2' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Critical hit chance', 'bonus' => 0.01),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Light lasers'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Accumulator capacity', 'bonus' => 0.01),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Laser turrets'),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	'Prometheus prototype' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Critical hit chance', 'bonus' => 0.01),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Light lasers'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Laser turrets'),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	
	'Riveler' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Mined amount',  'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	'Riveler Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Mined amount',  'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Industrial robot control', 'parameter' => 'Mined amount', 'bonus' => 0.01, 'apply' => 'Miner modules'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	'Riveler prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Mined amount',  'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	
	'Scarab' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Industrial module accumulator usage', 'bonus' => 0.01, 'apply' => 'Industrial NEXUS modules'),
		array('extension' => 'Glider robot control', 'parameter' => 'Surface hit size', 'bonus' => -0.30),
		array('extension' => 'Industrial robot control', 'parameter' => 'Armor', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Repair', 'bonus' => 0.05,'apply' => 'Armor repair amount bonus'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Demobilizer resistance', 'bonus' => 0.05)
	),
	'Scarab Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Industrial module accumulator usage', 'bonus' => 0.01, 'apply' => 'Industrial NEXUS modules'),
		array('extension' => 'Glider robot control', 'parameter' => 'Surface hit size', 'bonus' => -0.30),
		array('extension' => 'Industrial robot control', 'parameter' => 'Armor', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Repair', 'bonus' => 0.05,'apply' => 'Armor repair amount bonus'),
		array('extension' => 'Glider robot control', 'parameter' => 'Shield absorption', 'bonus' => 0.01,'apply' => 'Shield generators'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Demobilizer resistance', 'bonus' => 0.05)
	),
	'Scarab prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Industrial module accumulator usage', 'bonus' => 0.01, 'apply' => 'Industrial NEXUS modules'),
		array('extension' => 'Glider robot control', 'parameter' => 'Surface hit size', 'bonus' => -0.30),
		array('extension' => 'Industrial robot control', 'parameter' => 'Armor', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Repair', 'bonus' => 0.05,'apply' => 'Armor repair amount bonus'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Demobilizer resistance', 'bonus' => 0.05)
	),
	
	'Sequer' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator capacity', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05),
		array('extension' => 'Industrial robot control', 'parameter' => 'Armor', 'bonus' => 0.01),
		array('extension' => 'Basic robotics', 'parameter' => 'Shield absorption', 'bonus' => 0.05, 'apply' => 'Shield generators')
	),
	'Sequer Mk2' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator capacity', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05),
		array('extension' => 'Industrial robot control', 'parameter' => 'Demobilizer resistance', 'bonus' => 0.01),
		array('extension' => 'Industrial robot control', 'parameter' => 'Armor', 'bonus' => 0.01),
		array('extension' => 'Basic robotics', 'parameter' => 'Shield absorption', 'bonus' => 0.05, 'apply' => 'Shield generators')
	),
	'Sequer prototype' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator capacity', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Basic robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05),
		array('extension' => 'Industrial robot control', 'parameter' => 'Armor', 'bonus' => 0.01),
		array('extension' => 'Basic robotics', 'parameter' => 'Shield absorption', 'bonus' => 0.05, 'apply' => 'Shield generators')
	),
	
	'Seth' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Critical hit chance', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Medium lasers'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Laser turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator capacity', 'bonus' => 0.05),
	),
	'Seth Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Critical hit chance', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Medium lasers'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Damage', 'bonus' => 0.01, 'apply' => 'Weapons'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Laser turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator capacity', 'bonus' => 0.05),
	),
	'Seth prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Critical hit chance', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Medium lasers'),
		array('extension' => 'Thelodica robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Laser turrets'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator capacity', 'bonus' => 0.05),
	),
	
	'Symbiont' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Harvested amount', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05,'apply' => 'Terraformers'),
	),
	'Symbiont Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Harvested amount', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Industrial robot control', 'parameter' => 'Harvested amount', 'bonus' => 0.01, 'apply' => 'Harvesters'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05,'apply' => 'Terraformers'),
	),
	'Symbiont prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Harvested amount', 'bonus' => 0.05, 'apply' => 'Harvesters'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05,'apply' => 'Terraformers'),
	),
	
	'Termis' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Mined amount',  'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Geoscanner accuracy',  'bonus' => 0.05, 'apply' => 'Geoscanners'),
	),
	'Termis Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Mined amount',  'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Industrial robot control', 'parameter' => 'Mined amount', 'bonus' => 0.01, 'apply' => 'Miner modules'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Geoscanner accuracy',  'bonus' => 0.05, 'apply' => 'Geoscanners'),
	),
	'Termis prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Cycle time', 'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Mined amount',  'bonus' => 0.05, 'apply' => 'Miner modules'),
		array('extension' => 'Industrial robot control', 'parameter' => 'CPU usage', 'bonus' => 0.01, 'apply' => 'Miner and harvesting modules'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Geoscanner accuracy',  'bonus' => 0.05, 'apply' => 'Geoscanners'),
	),
	
	'Troiar' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Energy neutralizers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Energy drainers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Neutralized energy', 'bonus' => 0.08, 'apply' => 'Energy drainers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Light missile launchers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator recharge time', 'bonus' => 0.02),
	),
	'Troiar Mk2' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Energy neutralizers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Energy drainers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Neutralized energy', 'bonus' => 0.08, 'apply' => 'Energy drainers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Optimal range', 'bonus' => 0.02, 'apply' => 'Electronic warfare'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Light missile launchers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator recharge time', 'bonus' => 0.02),
	),
	'Troiar prototype' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Energy neutralizers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Energy drainers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Neutralized energy', 'bonus' => 0.08, 'apply' => 'Energy drainers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Light missile launchers'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator recharge time', 'bonus' => 0.02),
	),
	
	'Tyrannos' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Locking time', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Medium missile launchers'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Ballistics'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator recharge time', 'bonus' => 0.05),
	),
	'Tyrannos Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Locking time', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Medium missile launchers'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Accumulator capacity', 'bonus' => 0.01),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Ballistics'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator recharge time', 'bonus' => 0.05),
	),
	'Tyrannos prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Locking time', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Medium missile launchers'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Ballistics'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator recharge time', 'bonus' => 0.05),
	),
	
	'Vagabond' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'EW strength', 'bonus' => 0.05, 'apply' => 'Electronic warfare'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator usage',  'bonus' => 0.05, 'apply' => 'ECMs'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator usage',  'bonus' => 0.05, 'apply' => 'Demobilizers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	'Vagabond Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'EW strength', 'bonus' => 0.05, 'apply' => 'Electronic warfare'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator usage',  'bonus' => 0.05, 'apply' => 'ECMs'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator usage',  'bonus' => 0.05, 'apply' => 'Demobilizers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Optimal range', 'bonus' => 0.02, 'apply' => 'Electronic warfare'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	'Vagabond prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'EW strength', 'bonus' => 0.05, 'apply' => 'Electronic warfare'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator usage',  'bonus' => 0.05, 'apply' => 'ECMs'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator usage', 'bonus' => 0.05, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Accumulator usage',  'bonus' => 0.05, 'apply' => 'Demobilizers'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	
	'Waspish' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Optimal range modification', 'bonus' => 0.05, 'apply' => 'Ballistics'),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Light missile launchers'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Ballistics'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator recharge time', 'bonus' => 0.05),
	),
	'Waspish Mk2' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Optimal range modification', 'bonus' => 0.05, 'apply' => 'Ballistics'),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Light missile launchers'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Damage', 'bonus' => 0.01, 'apply' => 'Weapons'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Ballistics'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator recharge time', 'bonus' => 0.05),
	),
	'Waspish prototype' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Optimal range modification', 'bonus' => 0.05, 'apply' => 'Ballistics'),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage', 'bonus' => 0.05, 'apply' => 'Light missile launchers'),
		array('extension' => 'Pelistal robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Ballistics'),
		array('extension' => 'Basic robotics', 'parameter' => 'Accumulator recharge time', 'bonus' => 0.05),
	),
	
	'Yagel' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Falloff', 'bonus' => 0.05, 'apply' => 'Turrets'),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Light magnetic weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Light magnetic weapons'),
		array('extension' => 'Basic robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	'Yagel Mk2' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Falloff', 'bonus' => 0.05, 'apply' => 'Turrets'),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Light magnetic weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Accumulator capacity', 'bonus' => 0.01),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Light magnetic weapons'),
		array('extension' => 'Basic robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	'Yagel prototype' => array(
		array('extension' => 'Basic robotics', 'parameter' => 'Falloff', 'bonus' => 0.05, 'apply' => 'Turrets'),
		array('extension' => 'Basic robotics', 'parameter' => 'Damage',  'bonus' => 0.05, 'apply' => 'Light magnetic weapons'),
		array('extension' => 'Nuimqol robot control', 'parameter' => 'Cycle time', 'bonus' => 0.01, 'apply' => 'Light magnetic weapons'),
		array('extension' => 'Basic robotics', 'parameter' => 'Repair', 'bonus' => 0.05, 'apply' => 'Armor repair amount bonus')
	),
	
	'Zenith' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Locking range', 'bonus' => 0.02, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Locking time', 'bonus' => 0.03, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Electronic warfare'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	'Zenith Mk2' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Locking range', 'bonus' => 0.02, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Locking time', 'bonus' => 0.03, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Electronic warfare'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Optimal range', 'bonus' => 0.02, 'apply' => 'Electronic warfare'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
	'Zenith prototype' => array(
		array('extension' => 'Advanced robotics', 'parameter' => 'Locking range', 'bonus' => 0.02, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Locking time', 'bonus' => 0.03, 'apply' => 'Sensor suppressors'),
		array('extension' => 'Advanced robotics', 'parameter' => 'Optimal range', 'bonus' => 0.05, 'apply' => 'Electronic warfare'),
		array('extension' => 'Spec. ops. robot control', 'parameter' => 'Signal masking', 'bonus' => 0.01),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive chemical resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive seismic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive kinetic resistance', 'bonus' => 0.05),
		array('extension' => 'Advanced robotics', 'parameter' => 'Passive thermal resistance', 'bonus' => 0.05)
	),
);