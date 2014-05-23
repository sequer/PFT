<?php
	
	// agent
	
	require('logic/fetch-user-agents.php'); // fetch agents belonging to the user
	
	
	$thisAgentId = isset($_SESSION['agent_id']) ? $_SESSION['agent_id'] : 0;
	
	if (isset($userAgents[$thisAgentId])) {
		$_REQUEST['agent_id'] = $userAgents[$thisAgentId]['agent_id'];
		ob_start(); require('actions/agent-view.php'); ob_end_clean();
		if (isset($userAgents[$thisAgentId]['planned'])) {
			foreach($agentPlannedExtensions as $extensionName => $extensionLevel) {
				if ($extensionLevel > @$agentExtensions[$extensionName]) {
					$agentExtensions[$extensionName] = $extensionLevel;
				}
			}
		}
	} else {
		require('logic/perpetuum-extensions.php');
		$agentExtensions = array();
		foreach($extensionData as $extensionGroup) {
			foreach($extensionGroup as $extensionName => $extensionProperties) {
				$agentExtensions[$extensionName] = '10';
			}
		}
	}

	// !!! REQUIRES 'IS A' INFO ON MODULES (DENORMALIZATION IS AVAILABLE)
	// !!! store module information more effectively (pull parameters from database)
	
	$botBaseParameters = $botParameters; // var_dump($botBaseParameters); // keep a set of unmodified parameters on the side for base calculations
	
	// fit bot
	
	$modules = array();
	foreach($botFitting as $fittedModule) {
		$modules[$fittedModule['Name']] = $fittedModule; // base values for modules
	}
	
	// determine IS_A for modules
	// could be made optionally by checking directly using the inGroup function
	
	function inGroup($group = '', $groups) {
		foreach($groups as $groupName) {
			if ($group == $groupName) return true;
		}
		return false;
	}
	
	function in_group($group = '', $groups) {
		foreach($groups as $groupName) {
			if ($group == $groupName) return true;
		}
		return false;
	}
	
	foreach($botFitting as $fittedId => $fittedModule) {

		$groups = $fittedModule['Groups'];
		$botFitting[$fittedId]['Group'] = $groups[0];
		
		// ECM
		if (inGroup('Equipment', $groups)) $botFitting[$fittedId]['is equipment'] = true;
		
		// ECM
		if (inGroup('Lightweight frames', $groups)) $botFitting[$fittedId]['is lightweight frame'] = true;
		
		// ECM
		if (inGroup('ECMs', $groups)) $botFitting[$fittedId]['is ECM'] = true;
		
		// Sensor suppressor
		if (inGroup('Sensor suppressors', $groups)) $botFitting[$fittedId]['is sensor suppressor'] = true;
		
		// Electronic warfare
		if (inGroup('Short range demobilizers', $groups)) $botFitting[$fittedId]['is electronic warfare'] = true;
		if (inGroup('Long range demobilizers', $groups))  $botFitting[$fittedId]['is electronic warfare'] = true;
		if (inGroup('ECMs', $groups))                     $botFitting[$fittedId]['is electronic warfare'] = true;
		if (inGroup('Sensor suppressors', $groups))       $botFitting[$fittedId]['is electronic warfare'] = true;
		if (inGroup('ECCMs', $groups))                    $botFitting[$fittedId]['is electronic warfare'] = true;
		
		// Demobilizer
		if (inGroup('Short range demobilizers', $groups)) $botFitting[$fittedId]['is demobilizer'] = true;
		if (inGroup('Long range demobilizers', $groups))  $botFitting[$fittedId]['is demobilizer'] = true;
		
		// Signal detectors
		if (inGroup('Signal detectors', $groups)) $botFitting[$fittedId]['is signal detector'] = true;
		
		// Signal maskers
		if (inGroup('Signal maskers', $groups)) $botFitting[$fittedId]['is signal masker'] = true;
		
		// ECCM
		if (inGroup('ECCMs', $groups)) $botFitting[$fittedId]['is eccm'] = true;
		
		// Sensor amp
		if (inGroup('Sensor amplifiers', $groups)) $botFitting[$fittedId]['is sensor amplifier'] = true;
		
		// Remote sensor amp
		if (inGroup('Remote sensor amplifiers', $groups)) $botFitting[$fittedId]['is remote sensor amplifier'] = true;
		
		// Armor plates
		if (inGroup('Armor plates', $groups)) $botFitting[$fittedId]['is armor plate'] = true;
		
		// Specialized armor
		if (inGroup('Armor hardeners', $groups)) $botFitting[$fittedId]['is specialized armor'] = true;
		
		// Armor repairer
		if (inGroup('Armor repairers', $groups)) $botFitting[$fittedId]['is armor repairer'] = true;
		
		// Remote armor repairer
		if (inGroup('Remote armor repairers', $groups)) $botFitting[$fittedId]['is remote armor repairer'] = true;
		
		// Armor repairer tunings
		if (inGroup('Armor repairer tunings', $groups)) $botFitting[$fittedId]['is armor repairer tuning'] = true;
		
		// Energy transferers
		if (inGroup('Energy transferer', $groups)) $botFitting[$fittedId]['is energy transferer'] = true;
		
		// Engineering equipment
		if (inGroup('Engineering equipment', $groups)) $botFitting[$fittedId]['is engineering equipment'] = true;
		
		// Shield generator
		if (inGroup('Shield generators', $groups)) $botFitting[$fittedId]['is shield generator'] = true;
		
		// Shield hardener
		if (inGroup('Shield hardeners', $groups)) $botFitting[$fittedId]['is shield hardener'] = true;
		
		// Accumulator rechargers
		if (inGroup('Accumulator rechargers', $groups)) $botFitting[$fittedId]['is accumulator recharger'] = true;
		
		// Auxiliary accumulator
		if (inGroup('Auxiliary accumulators', $groups)) $botFitting[$fittedId]['is auxiliary accumulator'] = true;
		
		// Coreactors
		if (inGroup('Coreactors', $groups)) $botFitting[$fittedId]['is coreactor'] = true;
		
		// Evasive modules
		if (inGroup('Evasive modules', $groups)) $botFitting[$fittedId]['is evasive module'] = true;
		
		// Sensor amplifiers
		if (inGroup('Sensor amplifiers', $groups)) $botFitting[$fittedId]['is sensor amplifier'] = true;
		
		// Coprocessors
		if (inGroup('Coprocessors', $groups)) $botFitting[$fittedId]['is coprocessor'] = true;
		
		// Range extenders
		if (inGroup('Range extenders', $groups)) $botFitting[$fittedId]['is range extender'] = true;
		
		// Geoscanner
		
		if (inGroup('Geoscanners', $groups)) $botFitting[$fittedId]['is geoscanner'] = true;
		
		// Weapons
		if (inGroup('Lasers', $groups)) $botFitting[$fittedId]['is weapon'] = true;
		if (inGroup('Firearms', $groups)) $botFitting[$fittedId]['is weapon'] = true;
		if (inGroup('Missile launchers', $groups)) $botFitting[$fittedId]['is weapon'] = true;
		if (inGroup('Magnetic weapons', $groups)) $botFitting[$fittedId]['is weapon'] = true;
		
		if (inGroup('Lasers', $groups)) $botFitting[$fittedId]['is turret'] = true;
		if (inGroup('Firearms', $groups)) $botFitting[$fittedId]['is turret'] = true;
		if (inGroup('Missile launchers', $groups)) $botFitting[$fittedId]['is missile launcher'] = true;
		if (inGroup('Magnetic weapons', $groups)) $botFitting[$fittedId]['is turret'] = true;
		
		if (inGroup('Lasers', $groups)) $botFitting[$fittedId]['is optic weapon'] = true;
		if (inGroup('Firearms', $groups)) $botFitting[$fittedId]['is kinematic weapon'] = true;
		if (inGroup('Missile launchers', $groups)) $botFitting[$fittedId]['is ballistic weapon'] = true;
		if (inGroup('Magnetic weapons', $groups)) $botFitting[$fittedId]['is magnetostatic weapon'] = true;
		
		// Light ballistic weapons
		if (inGroup('Light missile launchers', $groups)) $botFitting[$fittedId]['is light ballistic weapon'] = true;
		
		// Medium ballistic weapons
		if (inGroup('Medium missile launchers', $groups)) $botFitting[$fittedId]['is medium ballistic weapon'] = true;
		
		// Light kinematic weapons
		if (inGroup('Conventional light firearms', $groups)) $botFitting[$fittedId]['is light kinematic weapon'] = true;
		
		// Medium kinematic weapons
		if (inGroup('Conventional medium firearms', $groups)) $botFitting[$fittedId]['is medium kinematic weapon'] = true;
		
		// Light magnetostatic weapons
		if (inGroup('Light magnetic weapons', $groups)) $botFitting[$fittedId]['is light magnetostatic weapon'] = true;
		
		// Medium magnetostatic weapons
		if (inGroup('Medium magnetic weapons', $groups)) $botFitting[$fittedId]['is medium magnetostatic weapon'] = true;
		
		// Light optic weapons
		if (inGroup('Light lasers', $groups)) $botFitting[$fittedId]['is light optic weapon'] = true;
		
		// Medium optic weapons
		if (inGroup('Medium lasers', $groups)) $botFitting[$fittedId]['is medium optic weapon'] = true;
		
		// Tuners
		if (inGroup('Weapon tunings', $groups)) $botFitting[$fittedId]['is weapon tuning'] = true; // seems odd, but it's true
		if (inGroup('Magnetic weapon tunings', $groups)) $botFitting[$fittedId]['is magnetic weapon tuning'] = true; // seems odd, but it's true
		if (inGroup('Firearm weapon tunings', $groups)) $botFitting[$fittedId]['is firearm weapon tuning'] = true; // seems odd, but it's true
		if (inGroup('Laser weapon tunings', $groups)) $botFitting[$fittedId]['is laser weapon tuning'] = true; // seems odd, but it's true
		if (inGroup('Missile launcher tunings', $groups)) $botFitting[$fittedId]['is missile launcher tuning'] = true; // seems odd, but it's true
		
		// Ammo
		if (inGroup('Missiles', $groups)) $botFitting[$fittedId]['is missile'] = true;
		if (inGroup('Slugs', $groups)) $botFitting[$fittedId]['is slug'] = true;
		if (inGroup('Energy cells', $groups)) $botFitting[$fittedId]['is energy cell'] = true;
		if (inGroup('Bullets', $groups)) $botFitting[$fittedId]['is bullet'] = true;
		
		if (inGroup('Small missiles', $groups)) $botFitting[$fittedId]['is small missile'] = true;
		if (inGroup('Medium missiles', $groups)) $botFitting[$fittedId]['is medium missile'] = true;
		if (inGroup('Small slugs', $groups)) $botFitting[$fittedId]['is small slug'] = true;
		if (inGroup('Medium slugs', $groups)) $botFitting[$fittedId]['is medium slug'] = true;
		if (inGroup('Small energy cells', $groups)) $botFitting[$fittedId]['is small energy cell'] = true;
		if (inGroup('Medium energy cells', $groups)) $botFitting[$fittedId]['is medium energy cell'] = true;
		if (inGroup('Small bullets', $groups)) $botFitting[$fittedId]['is small bullet'] = true;
		if (inGroup('Medium bullets', $groups)) $botFitting[$fittedId]['is medium bullet'] = true;
		
		// add parameters
		if (isset($botFitting[$fittedId]['is weapon'])) {
			if (!isset($fittedModule['Damage'])) $botFitting[$fittedId]['Damage'] = 100;
			$botFitting[$fittedId]['Cycle time modifiers'] = array();
			$botFitting[$fittedId]['Damage modifiers'] = array();
			$botFitting[$fittedId]['Falloff modifiers'] = array();
		}
	}
	
	// echo '<pre>'; print_r($botFitting); echo '</pre>';
	
	/* apply module parameters on bot that are unaffected by extensions, but can affect other extension affected modules */
	
	foreach($botFitting as $fittedId => $fittedModule) {		
	
		if (isset($fittedModule['is evasive module'])) { // surface hit size affect shield absorption ratio
			$botParameters['Surface hit size'] = $botParameters['Surface hit size'] + $fittedModule['Surface hit size'];
		}
		
	}
	
	/* apply extensions on modules */
	
	foreach($botFitting as $fittedId => $fittedModule) {
		
		if (isset($fittedModule['is engineering equipment']) && isset($fittedModule['CPU usage'])) {
			$botFitting[$fittedId]['CPU usage'] = $botFitting[$fittedId]['CPU usage'] + ($modules[$fittedModule['Name']]['CPU usage'] * @$agentExtensions['Optimized engineering'] * -0.03); 
		}
		
		if ((isset($fittedModule['is ECM']) || isset($fittedModule['is sensor suppressor'])) && isset($fittedModule['EW strength'])) {
			$botFitting[$fittedId]['EW strength'] = $botFitting[$fittedId]['EW strength'] + ($modules[$fittedModule['Name']]['EW strength'] * @$agentExtensions['Jamming electronics'] * 0.03);
			$botFitting[$fittedId]['EW strength'] = $botFitting[$fittedId]['EW strength'] + ($modules[$fittedModule['Name']]['EW strength'] * @$agentExtensions['Complex jamming electronics'] * 0.03);
		}
		
		if (isset($fittedModule['Top speed modification'])) {
			$botFitting[$fittedId]['Top speed modification'] = 100 * (((1 + ($modules[$fittedModule['Name']]['Top speed modification'] / 100)) / (1 + (@$agentExtensions['Demobilization'] * 0.03))) - 1);
		}
		
		if (isset($fittedModule['is ECM']) && isset($fittedModule['Accumulator consumption'])) {
			$botFitting[$fittedId]['Accumulator consumption'] = $botFitting[$fittedId]['Accumulator consumption'] + ($modules[$fittedModule['Name']]['Accumulator consumption'] * @$agentExtensions['Efficient ECM technology'] * -0.03); 
		}
		
		if (isset($fittedModule['is electronic warfare']) && isset($fittedModule['Optimal range'])) {
			$botFitting[$fittedId]['Optimal range'] = $botFitting[$fittedId]['Optimal range'] + ($modules[$fittedModule['Name']]['Optimal range'] * @$agentExtensions['Long distance electronic warfare'] * 0.03); 
		}
		
		if (isset($fittedModule['is electronic warfare']) && isset($fittedModule['CPU usage'])) {
			$botFitting[$fittedId]['CPU usage'] = $botFitting[$fittedId]['CPU usage'] + ($modules[$fittedModule['Name']]['CPU usage'] * @$agentExtensions['Optimized electronic warfare'] * -0.03); 
		}
		
		if (isset($fittedModule['is signal detector']) && isset($fittedModule['CPU usage'])) {
			$botFitting[$fittedId]['CPU usage'] = $botFitting[$fittedId]['CPU usage'] + ($modules[$fittedModule['Name']]['CPU usage'] * @$agentExtensions['Optimized signal detection'] * -0.03); 
		}
		
		if (isset($fittedModule['is signal masker']) && isset($fittedModule['CPU usage'])) {
			$botFitting[$fittedId]['CPU usage'] = $botFitting[$fittedId]['CPU usage'] + ($modules[$fittedModule['Name']]['CPU usage'] * @$agentExtensions['Optimized signal masking'] * -0.03); 
		}
		
		if (isset($fittedModule['is signal detector']) && isset($fittedModule['Signal detection modification'])) {
			$botFitting[$fittedId]['Signal detection modification'] = 100 * (((1 + ($modules[$fittedModule['Name']]['Signal detection modification'] / 100)) * (1 + (@$agentExtensions['Signal detection'] * 0.02))) - 1);
		}
		
		if (isset($fittedModule['is signal masker']) && isset($fittedModule['Signal masking modification'])) {
			$botFitting[$fittedId]['Signal masking modification'] = 100 * (((1 + ($modules[$fittedModule['Name']]['Signal masking modification'] / 100)) * (1 + (@$agentExtensions['Signal masking'] * 0.02))) - 1);
		}
		
		if ((isset($fittedModule['is sensor amplifier']) || isset($fittedModule['is remote sensor amplifier'])) && isset($fittedModule['Locking time'])) {
			$botFitting[$fittedId]['Locking time'] = 100 * (((1 + ($modules[$fittedModule['Name']]['Locking time'] / 100)) / (1 + (@$agentExtensions['Sensor connection'] * 0.02))) - 1);
		}
		
		if (isset($fittedModule['is sensor suppressor']) && isset($fittedModule['Locking time'])) {
			$botFitting[$fittedId]['Locking time'] = ((1 + ($modules[$fittedModule['Name']]['Locking time'] / 100)) * (1 + (@$agentExtensions['Sensor suppressing'] * 0.03)) - 1) * 100; 
		}
		
		if (isset($fittedModule['is remote sensor amplifier']) && isset($fittedModule['Accumulator consumption'])) {
			$botFitting[$fittedId]['Accumulator consumption'] = $botFitting[$fittedId]['Accumulator consumption'] + ($modules[$fittedModule['Name']]['Accumulator consumption'] * @$agentExtensions['Remote sensor amplification'] * -0.05); 
		}
		
		if ((isset($fittedModule['is armor repairer']) || isset($fittedModule['is remote armor repairer'])) && isset($fittedModule['Cycle time'])) {
			@$botFitting[$fittedId]['Cycle time modifiers']['Ext'] += @$agentExtensions['Accelerated armor repair'] * 0.05; 
		}
		
		if ((isset($fittedModule['is armor plate']) ||
			isset($fittedModule['is specialized armor']) ||
			isset($fittedModule['is armor repairer']) ||
			isset($fittedModule['is remote armor repairer']) ||
			isset($fittedModule['is armor repairer tuning'])
		) && isset($fittedModule['Reactor usage'])) {
			$botFitting[$fittedId]['Reactor usage'] = $botFitting[$fittedId]['Reactor usage'] + ($modules[$fittedModule['Name']]['Reactor usage'] * @$agentExtensions['Economical armor usage'] * -0.03); 
		}
		
		if ((isset($fittedModule['is armor plate']) ||
			isset($fittedModule['is specialized armor']) ||
			isset($fittedModule['is armor repairer']) ||
			isset($fittedModule['is remote armor repairer']) ||
			isset($fittedModule['is armor repairer tuning'])
		) && isset($fittedModule['CPU usage'])) {
			$botFitting[$fittedId]['CPU usage'] = $botFitting[$fittedId]['CPU usage'] + ($modules[$fittedModule['Name']]['CPU usage'] * @$agentExtensions['Optimized armor usage'] * -0.03); 
		}
		
		if (isset($fittedModule['is shield generator']) && isset($fittedModule['Reactor usage'])) {
			$botFitting[$fittedId]['Reactor usage'] = $botFitting[$fittedId]['Reactor usage'] + ($modules[$fittedModule['Name']]['Reactor usage'] * @$agentExtensions['Economical shield usage'] * -0.03); 
		}
		
		if (isset($fittedModule['is shield generator']) && isset($fittedModule['CPU usage'])) {
			$botFitting[$fittedId]['CPU usage'] = $botFitting[$fittedId]['CPU usage'] + ($modules[$fittedModule['Name']]['CPU usage'] * @$agentExtensions['Optimized shield usage'] * -0.03); 
		}
		
		if (isset($fittedModule['is weapon'])) {
			$botFitting[$fittedId]['Reactor usage'] = $botFitting[$fittedId]['Reactor usage'] + ($modules[$fittedModule['Name']]['Reactor usage'] * @$agentExtensions['Economical weapon usage'] * -0.03); 
			$botFitting[$fittedId]['CPU usage'] = $botFitting[$fittedId]['CPU usage'] + ($modules[$fittedModule['Name']]['CPU usage'] * @$agentExtensions['Optimized weapon usage'] * -0.03); 
		}
		
		if (isset($fittedModule['is weapon tuning'])) {
			$botFitting[$fittedId]['Reactor usage'] = $botFitting[$fittedId]['Reactor usage'] + ($modules[$fittedModule['Name']]['Reactor usage'] * @$agentExtensions['Economical weapon usage'] * -0.03);
			$botFitting[$fittedId]['CPU usage'] = $botFitting[$fittedId]['CPU usage'] + ($modules[$fittedModule['Name']]['CPU usage'] * @$agentExtensions['Optimized weapon usage'] * -0.03); 
		}
		
		if (isset($fittedModule['is engineering equipment']) && isset($fittedModule['Optimal range'])) {
			$botFitting[$fittedId]['Optimal range'] = $botFitting[$fittedId]['Optimal range'] + ($modules[$fittedModule['Name']]['Optimal range'] * @$agentExtensions['Long range engineering'] * 0.03); 
		}
		
		if (isset($fittedModule['is energy transferer']) && isset($fittedModule['Accumulator consumption'])) {
			$botFitting[$fittedId]['Accumulator consumption'] = $botFitting[$fittedId]['Accumulator consumption'] + ($modules[$fittedModule['Name']]['Accumulator consumption'] * @$agentExtensions['Efficient energy transfer'] * -0.05); 
		}
		
		if ((isset($fittedModule['is armor repairer']) || isset($fittedModule['is remote armor repairer'])) && isset($fittedModule['Repair'])) {
			$botFitting[$fittedId]['Repair'] = $botFitting[$fittedId]['Repair'] + ($modules[$fittedModule['Name']]['Repair'] * @$agentExtensions['Improved armor repair'] * 0.02); 
		}
		
		if (isset($fittedModule['is remote armor repairer']) && isset($fittedModule['Accumulator consumption'])) {
			$botFitting[$fittedId]['Accumulator consumption'] = $botFitting[$fittedId]['Accumulator consumption'] + ($modules[$fittedModule['Name']]['Accumulator consumption'] * @$agentExtensions['Remote armor repair'] * -0.03); 
		}
		
		if (isset($fittedModule['is energy drainer']) && isset($fittedModule['Drained energy'])) {
			$botFitting[$fittedId]['Drained energy'] = $botFitting[$fittedId]['Drained energy'] + ($modules[$fittedModule['Name']]['Drained energy'] * @$agentExtensions['Improved energy drain'] * 0.02); 
		}
		
		if (isset($fittedModule['is energy neutralizer']) && isset($fittedModule['Neutralized energy'])) {
			$botFitting[$fittedId]['Neutralized energy'] = $botFitting[$fittedId]['Neutralized energy'] + ($modules[$fittedModule['Name']]['Neutralized energy'] * @$agentExtensions['Improved energy neutralization'] * 0.02); 
		}
		
		// shield generator
		if (isset($fittedModule['is shield generator']) && isset($fittedModule['Absorption ratio'])) {
			$botFitting[$fittedId]['Shield absorption'] = 2 * (1 + (@$agentExtensions['Improved shield technology'] * 0.03));
			// include shield hardener(s)
			foreach($botFitting as $_fittedId => $_fittedModule) { 
				if (isset($_fittedModule['is shield hardener'])) {
					$botFitting[$fittedId]['Shield absorption'] = $botFitting[$fittedId]['Shield absorption'] * (1 + ($_fittedModule['Shield absorption'] / 100));
				}
			}
			$botFitting[$fittedId]['Absorption ratio'] = ((1 / $botFitting[$fittedId]['Shield absorption']) / $modules[$fittedModule['Name']]['Shield radius']) * $botParameters['Surface hit size'];
		}
		
		// weapon damage
		
		if (isset($fittedModule['is weapon'])) {
			$botFitting[$fittedId]['Damage modifiers']['Ta'] = @$agentExtensions['Target analysis'] * 0.01; 
		}
		
		if (isset($fittedModule['is medium ballistic weapon'])) {
			$botFitting[$fittedId]['Damage modifiers']['RbWc'] = @$agentExtensions['Advanced ballistics'] * 0.03; // robot bonuses & weapon control bonuses
		}
		
		if (isset($fittedModule['is medium kinematic weapon'])) {
			$botFitting[$fittedId]['Damage modifiers']['RbWc'] = @$agentExtensions['Advanced kinematics'] * 0.03; // robot bonuses & weapon control bonuses
		}
		
		if (isset($fittedModule['is medium magnetostatic weapon'])) {
			$botFitting[$fittedId]['Damage modifiers']['RbWc'] = @$agentExtensions['Advanced magnetostatics'] * 0.03; // robot bonuses & weapon control bonuses
		}
		
		if (isset($fittedModule['is medium optic weapon'])) {
			$botFitting[$fittedId]['Damage modifiers']['RbWc'] = @$agentExtensions['Advanced optics'] * 0.03; // robot bonuses & weapon control bonuses
		}
		
		if (isset($fittedModule['is light ballistic weapon'])) {
			$botFitting[$fittedId]['Damage modifiers']['RbWc'] = @$agentExtensions['Basic ballistics'] * 0.03; // robot bonuses & weapon control bonuses
		}
		
		if (isset($fittedModule['is light kinematic weapon'])) {
			$botFitting[$fittedId]['Damage modifiers']['RbWc'] = @$agentExtensions['Basic kinematics'] * 0.03; // robot bonuses & weapon control bonuses
		}
		
		if (isset($fittedModule['is light magnetostatic weapon'])) {
			$botFitting[$fittedId]['Damage modifiers']['RbWc'] = @$agentExtensions['Basic magnetostatics'] * 0.03; // robot bonuses & weapon control bonuses
		}
		
		if (isset($fittedModule['is light optic weapon'])) {
			$botFitting[$fittedId]['Damage modifiers']['RbWc'] = @$agentExtensions['Basic optics'] * 0.03; // robot bonuses & weapon control bonuses
		}
		
		if (isset($fittedModule['is turret']) && isset($fittedModule['Cycle time'])) {
			@$botFitting[$fittedId]['Cycle time modifiers']['Ext'] += @$agentExtensions['General firing'] * 0.01;
			@$botFitting[$fittedId]['Cycle time modifiers']['Ext'] += @$agentExtensions['Rapid-firing'] * 0.03;
		}
		
		if (isset($fittedModule['is missile launcher']) && isset($fittedModule['Cycle time'])) {
			@$botFitting[$fittedId]['Cycle time modifiers']['Ext'] += @$agentExtensions['Missile launch'] * 0.01;
			@$botFitting[$fittedId]['Cycle time modifiers']['Ext'] += @$agentExtensions['Complex missile launch'] * 0.03;
		}
		
		if (isset($fittedModule['is turret']) && isset($fittedModule['Optimal range'])) {
			$botFitting[$fittedId]['Optimal range'] = $botFitting[$fittedId]['Optimal range'] * (1 + (@$agentExtensions['Sharpshooting'] * 0.03)); 
		}
		
		if (isset($fittedModule['is turret']) && isset($fittedModule['Falloff'])) {
			@$botFitting[$fittedId]['Falloff modifiers']['RbIf'] += @$agentExtensions['Improved falloff'] * 0.03; //RbIf
		}
		
		// charges
		if (isset($fittedModule['is small missile']) || isset($fittedModule['is medium missile'])) {
			@$botFitting[$fittedId]['Optimal range modification'] = @$botFitting[$fittedId]['Optimal range modification'] + @$agentExtensions['Propellant mixing'] * 3; 
		}
		
		// geoscanners
		if (isset($fittedModule['is geoscanner'])) {
			@$botFitting[$fittedId]['Geoscanner accuracy'] = @$botFitting[$fittedId]['Geoscanner accuracy'] * (1 + (@$agentExtensions['Basic geochemistry'] * 0.045)); 
		}
		
	}
	
	
	/* apply modules that affect bot stats before extensions on bot */
	
	foreach($botFitting as $fittedId => $fittedModule) {
		
		if (isset($fittedModule['is auxiliary accumulator'])) {
			$botParameters['Accumulator capacity'] = $botParameters['Accumulator capacity'] + $fittedModule['Accumulator capacity'];
			$botParameters['Accumulator'] = $botParameters['Accumulator capacity'];
			// correct the base parameters to correctly calculate robot bonus
			$botBaseParameters['Accumulator capacity'] = $botParameters['Accumulator capacity']; 
			$botBaseParameters['Accumulator'] = $botParameters['Accumulator'];
		}
		
		if (isset($fittedModule['is armor plate'])) {
			$botParameters['Surface hit size'] = $botParameters['Surface hit size'] + $fittedModule['Surface hit size'];
			$botParameters['Armor'] = $botParameters['Armor'] + $fittedModule['Armor'];
			$botParameters['Armor status'] = $botParameters['Armor'];
		}
		
	}
	
	
	/* apply extensions on robot */
	
	$botParameters['Accumulator capacity'] = $botParameters['Accumulator capacity'] + ($botParameters['Accumulator capacity'] * @$agentExtensions['Accumulator expansion'] * 0.03); // accumulator expansion adds 3% to accu per level
	$botParameters['Accumulator'] = $botParameters['Accumulator capacity']; // update to reflect change
	
	$botParameters['Accumulator recharge time'] = $botParameters['Accumulator recharge time'] - ($botBaseParameters['Accumulator recharge time'] * @$agentExtensions['Energy management'] * 0.03);
	
	$botParameters['CPU performance'] = $botParameters['CPU performance'] + ($botBaseParameters['CPU performance'] * @$agentExtensions['Data processing'] * 0.03); // data processing adds 3% to CPU per level
	$botParameters['Available CPU performance'] = $botParameters['CPU performance']; // update to reflect change
	
	$botParameters['Reactor performance'] = $botParameters['Reactor performance'] + ($botBaseParameters['Reactor performance'] * @$agentExtensions['Reactor expansion'] * 0.03);
	$botParameters['Available reactor performance'] = $botParameters['Reactor performance'];
	
	$botParameters['Armor'] = $botParameters['Armor'] + ($botParameters['Armor'] * @$agentExtensions['Complex mechanics'] * 0.05) + ($botParameters['Armor'] * @$agentExtensions['Mechanics'] * 0.02);
	$botParameters['Armor status'] = $botParameters['Armor'];
	
	$botParameters['Maximum targets'] = 1 + (@$agentExtensions['Targeting']);
	if ($botParameters['Maximum targets'] > $botBaseParameters['Maximum targets']) {
		$botParameters['Maximum targets'] = $botBaseParameters['Maximum targets'];
	}
	
	$botParameters['Locking range'] = $botParameters['Locking range'] + ($botBaseParameters['Locking range'] * @$agentExtensions['Long range targeting'] * 0.05);
	$botParameters['Locking time'] = $botBaseParameters['Locking time'] / (1 + (@$agentExtensions['Accelerated target locking'] * 0.05));
	
	$botParameters['Missile guidance accuracy'] = $botBaseParameters['Missile guidance accuracy'] + @$agentExtensions['Missile guidance'];
	
	$botParameters['Ammunition reload time'] = $botParameters['Ammunition reload time'] - ($botBaseParameters['Ammunition reload time'] * @$agentExtensions['Accelerated reloading'] * 0.05);
	
	$botParameters['Critical hit chance'] = 1 + @$agentExtensions['Critical hit'];
	
	
	/* apply modules that affect bot stats after extensions on bot */
	
	foreach($botFitting as $fittedId => $fittedModule) {

		if (isset($fittedModule['is accumulator recharger'])) {
			$botParameters['Accumulator recharge time'] = $botParameters['Accumulator recharge time'] * (($fittedModule['Accumulator recharge time'] / 100) + 1);
		}
		
		if (isset($fittedModule['is coreactor'])) {
			$botParameters['Reactor performance'] = $botParameters['Reactor performance'] * ($fittedModule['Reactor performance'] / 100);
			$botParameters['Available reactor performance'] = $botParameters['Reactor performance'];
		}
		
		if (isset($fittedModule['is coprocessor'])) {
			$botParameters['CPU performance'] = $botParameters['CPU performance'] * (1 + ($fittedModule['CPU performance'] / 100));
			$botParameters['Available CPU performance'] = $botParameters['CPU performance'];
		}
		
		if (isset($fittedModule['Demobilizer resistance'])) {
			$botParameters['Demobilizer resistance'] = @$botParameters['Demobilizer resistance'] + $fittedModule['Demobilizer resistance'];
		}
		
		if (isset($fittedModule['is shield generator']) && isset($fittedModule['Absorption ratio'])) {
			if ($fittedModule['Shield radius'] > $botParameters['Surface hit size']) { // this is where small shield are put on larger bots
				$fittedModule[$fittedId]['Absorption ratio'] = ($fittedModule['Absorption ratio'] / $fittedModule['Shield radius']) * $botParameters['Surface hit size'];
			}
		}
		
		if (isset($fittedModule['is lightweight frame'])) {
			$botParameters['Armor'] = $botParameters['Armor'] * (($fittedModule['Armor hit points'] / 100) + 1);
			$botParameters['Armor status'] = $botParameters['Armor'];
			$botParameters['Mass'] = $botBaseParameters['Mass'] * (($fittedModule['Mass'] / 100) + 1);
			$botFitting[$fittedId]['Mass'] = 2; // LWF's have an assumed 2 kg mass
		}
		
		if (isset($fittedModule['is specialized armor'])) {
			if (isset($fittedModule['Passive chemical resistance'])) {
				$botParameters['Passive chemical resistance'] = $botParameters['Passive chemical resistance'] + $fittedModule['Passive chemical resistance'];
			}
			if (isset($fittedModule['Passive kinetic resistance'])) {
				$botParameters['Passive kinetic resistance'] = $botParameters['Passive kinetic resistance'] + $fittedModule['Passive kinetic resistance'];
			}
			if (isset($fittedModule['Passive seismic resistance'])) {
				$botParameters['Passive seismic resistance'] = $botParameters['Passive seismic resistance'] + $fittedModule['Passive seismic resistance'];
			}
			if (isset($fittedModule['Passive thermal resistance'])) {
				$botParameters['Passive thermal resistance'] = $botParameters['Passive thermal resistance'] + $fittedModule['Passive thermal resistance'];
			}
		}
		
		if (isset($fittedModule['is sensor amplifier']) and $fittedModule['Active']) {
			$botParameters['Locking range'] = $botParameters['Locking range'] * (1 + ($fittedModule['Locking range'] / 100));
			$botParameters['Locking time'] = $botParameters['Locking time'] - ($botParameters['Locking time'] * (($fittedModule['Locking time'] * -1) / 100));
		}
		
		if (isset($fittedModule['is signal detector']) and $fittedModule['Active']) {
			$botParameters['Signal detection'] = $botParameters['Signal detection'] * (1 + ($fittedModule['Signal detection modification'] / 100));
		}
		
		if (isset($fittedModule['is signal masker']) and $fittedModule['Active']) {
			$botParameters['Signal masking'] = $botParameters['Signal masking'] * (1 + ($fittedModule['Signal masking modification'] / 100));
		}
		
		if (isset($fittedModule['is eccm'])) {
			$botParameters['Sensor strength'] = $botParameters['Sensor strength'] * (1 + ($fittedModule['Sensor strength'] / 100));
		}
		
		if (isset($fittedModule['is range extender'])) {
			foreach($botFitting as $_fittedId => $_fittedModule) {
				if (isset($_fittedModule['Optimal range'])) {
					$botFitting[$_fittedId]['Optimal range'] = $botFitting[$_fittedId]['Optimal range'] * (1 + ($fittedModule['Optimal range modifier'] / 100));
				}
			}
		}
		
		if (isset($fittedModule['is magnetic weapon tuning'])) {
			foreach($botFitting as $_fittedId => $_fittedModule) {
				if (isset($_fittedModule['is magnetostatic weapon'])) {		
					$botFitting[$_fittedId]['Damage modifiers']['Wt'][] = 1 + ($fittedModule['Damage'] / 100); // robot bonuses & weapon control bonuses
					$botFitting[$_fittedId]['Cycle time modifiers']['Wt'][] = 1 + ($fittedModule['Magnetic weapon cycle time'] / 100);
				}
			}
		}
		
		if ($fittedModule['Group'] == 'Firearm tunings') {
			foreach($botFitting as $_fittedId => $_fittedModule) {
				if (isset($_fittedModule['is kinematic weapon'])) {		
					$botFitting[$_fittedId]['Damage modifiers']['Wt'][] = 1 + ($fittedModule['Damage'] / 100); // robot bonuses & weapon control bonuses
					$botFitting[$_fittedId]['Cycle time modifiers']['Wt'][] = 1 + ($fittedModule['Cycle time'] / 100);
				}
			}
		}
		
		if ($fittedModule['Group'] == 'Laser tunings') {
			foreach($botFitting as $_fittedId => $_fittedModule) {
				if (isset($_fittedModule['is optic weapon'])) {		
					$botFitting[$_fittedId]['Damage modifiers']['Wt'][] = 1 + ($fittedModule['Damage'] / 100); // robot bonuses & weapon control bonuses
					$botFitting[$_fittedId]['Cycle time modifiers']['Wt'][] = 1 + ($fittedModule['Laser cycle time'] / 100);
				}
			}
		}
		
		if ($fittedModule['Group'] == 'Missile launcher tunings') {
			foreach($botFitting as $_fittedId => $_fittedModule) {
				if (isset($_fittedModule['is ballistic weapon'])) {		
					$botFitting[$_fittedId]['Damage modifiers']['Wt'][] = 1 + ($fittedModule['Damage'] / 100); // robot bonuses & weapon control bonuses
					$botFitting[$_fittedId]['Cycle time modifiers']['Wt'][] = 1 + ($fittedModule['Missile launcher cycle time'] / 100);
				}
			}
		}
	}
	
	
	/* apply bot bonuses */
	
	require('logic/perpetuum-bot-bonuses.php');
	
	$p = array();
	foreach($botBonuses as $bots) {
		foreach($bots as $bb) {
			$p[$bb['parameter']][$bb['apply']] = true;
		}
	}
	
	foreach($botBonuses[$thisFitting['robot_name']] as $bonus) {
		$bonus['bonus'] = $bonus['bonus'] * @$agentExtensions[$bonus['extension']];
		
		/* bonuses that apply on bot */
		if ($bonus['apply'] == 'bot') {
			switch($bonus['parameter']) {
				
				case 'Accumulator capacity':
					$botParameters[$bonus['parameter']] = $botParameters[$bonus['parameter']] + ($botBaseParameters[$bonus['parameter']] * $bonus['bonus']);
					break;
				
				case 'Accumulator recharge time':
					$botParameters['Accumulator recharge time'] = $botParameters['Accumulator recharge time'] - ($botBaseParameters['Accumulator recharge time'] * $bonus['bonus']);
					break;
				
				case 'Locking time':
					$botParameters['Locking time'] = $botBaseParameters['Locking time'] / (1 + (@$agentExtensions['Accelerated target locking'] * 0.05) + $bonus['bonus']);  // overwrite, see: http://forums.perpetuum-online.com/post/11277/#p11277
					break;
				
				case 'Passive chemical resistance':
					$botParameters[$bonus['parameter']] = $botParameters[$bonus['parameter']] * (1 + $bonus['bonus']);
					break;
				
				case 'Passive seismic resistance':
					$botParameters[$bonus['parameter']] = $botParameters[$bonus['parameter']] * (1 + $bonus['bonus']);
					break;
				
				case 'Passive kinetic resistance':
					$botParameters[$bonus['parameter']] = $botParameters[$bonus['parameter']] * (1 + $bonus['bonus']);
					break;
				
				case 'Passive thermal resistance':
					$botParameters[$bonus['parameter']] = $botParameters[$bonus['parameter']] * (1 + $bonus['bonus']);
					break;
				
			}
		} else {
			/* bonuses on modules/charges */
			foreach($botFitting as $fittedId => $fittedModule) {
				if (isset($fittedModule[$bonus['apply']])) {
					switch($bonus['parameter']) {
						
						case 'Cycle time':
							@$botFitting[$fittedId]['Cycle time modifiers']['Rb'] += $bonus['bonus']; // robot bonus and weapon control extension bonuses can be added
							break;
						
						case 'Damage':
							@$botFitting[$fittedId]['Damage modifiers']['RbWc'] += $bonus['bonus']; // robot bonus and weapon control extension bonuses can be added
							break;
						
						case 'Falloff':
							@$botFitting[$fittedId]['Falloff modifiers']['RbIf'] += $bonus['bonus']; // robot bonus and improved falloff extension bonus can be added
							break;
						
						case 'Optimal range modification':
							@$botFitting[$fittedId]['Optimal range modification'] += $bonus['bonus'];
							break;
						
						case 'Repair':
							if (isset($botFitting[$fittedId]['Repair'])) {
								$botFitting[$fittedId]['Repair'] = @$botFitting[$fittedId]['Repair'] + ($modules[$fittedModule['Name']]['Repair'] * $bonus['bonus']);
							}
							break;
						
						case 'Geoscanner accuracy':
							@$botFitting[$fittedId]['Geoscanner accuracy'] = $modules[$fittedModule['Name']]['Geoscanner accuracy'] * (1 + ((@$agentExtensions['Basic geochemistry'] * 0.045) + $bonus['bonus'])); 
							break;
						
					}
				}
			}
		}
	}
	
	/* apply modules that affect bot stats after extensions -and- bonuses on bot */
	
	foreach($botFitting as $fittedId => $fittedModule) {
		
		// active hardeners simply add points after passive bonuses and bot bonuses
		if (isset($fittedModule['is specialized armor']) and $fittedModule['Active']) { 
			if (isset($fittedModule['Active chemical resistance'])) {
			$botParameters['Passive chemical resistance'] = $botParameters['Passive chemical resistance'] + $fittedModule['Active chemical resistance'];
			}
			if (isset($fittedModule['Active kinetic resistance'])) {
				$botParameters['Passive kinetic resistance'] = $botParameters['Passive kinetic resistance'] + $fittedModule['Active kinetic resistance'];
			}
			if (isset($fittedModule['Active seismic resistance'])) {
				$botParameters['Passive seismic resistance'] = $botParameters['Passive seismic resistance'] + $fittedModule['Active seismic resistance'];
			}
			if (isset($fittedModule['Active thermal resistance'])) {
				$botParameters['Passive thermal resistance'] = $botParameters['Passive thermal resistance'] + $fittedModule['Active thermal resistance'];
			}
		}
		
	}
	
	/* apply fitting requirements */
	
	foreach($botFitting as $fittedModule) {
		$botParameters['Available CPU performance'] = $botParameters['Available CPU performance'] - @$fittedModule['CPU usage'];
		$botParameters['Available reactor performance'] = $botParameters['Available reactor performance'] - @$fittedModule['Reactor usage'];
		$botParameters['Mass'] = $botParameters['Mass'] + @$fittedModule['Mass'];
	}
	
	/* correct top speed because of mass */
	
	$botParameters['Top speed'] = ($botBaseParameters['Mass'] / $botParameters['Mass']) * $botParameters['Top speed'];
	
	/* transfer missile properties to missile launchers */
	
	foreach($botFitting as $fittedId => $fittedModule) {
		if (isset($fittedModule['is light ballistic weapon'])) {
			foreach($botFitting as $_fittedId => $_fittedModule) {
				if (isset($_fittedModule['is small missile'])) {
					$botFitting[$fittedId]['Optimal range'] = $_fittedModule['Optimal range'] * (1 + ($_fittedModule['Optimal range modification'] / 100)) * (1 + ($fittedModule['Missile optimal range modification'] / 100));
				}
			}
		}
	}
	
	/* apply modifiers in the form: base * n1 * nx */
	
	foreach($botFitting as $fittedId => $fittedModule) {
		
		// Cycle time
		if (isset($fittedModule['Cycle time modifiers'])) {
			foreach($fittedModule['Cycle time modifiers'] as $multiplier) {
				if (!is_array($multiplier)) {
					$botFitting[$fittedId]['Cycle time'] = $botFitting[$fittedId]['Cycle time'] / (1 + $multiplier);
				} else {
					foreach($multiplier as $multiplierTuner) { // this is a tuner multiplier
						$botFitting[$fittedId]['Cycle time'] = $botFitting[$fittedId]['Cycle time'] * $multiplierTuner;
					}
				}
				
			}
		}
		
		// Damage
		if (isset($fittedModule['Damage modifiers'])) {
			foreach($fittedModule['Damage modifiers'] as $multiplier) {
				if (!is_array($multiplier)) {
					$botFitting[$fittedId]['Damage'] = $botFitting[$fittedId]['Damage'] * (1 + $multiplier);
				} else {
					foreach($multiplier as $multiplierTuner) { // this is a tuner multiplier
						$botFitting[$fittedId]['Damage'] = $botFitting[$fittedId]['Damage'] * $multiplierTuner;
					}
				}
				
			}
		}
		
		// Falloff
		if (isset($fittedModule['Falloff modifiers'])) {
			foreach($fittedModule['Falloff modifiers'] as $multiplier) {
				$botFitting[$fittedId]['Falloff'] = $botFitting[$fittedId]['Falloff'] * (1 + $multiplier);
			}
		}
	}
	
	
	// accumulator simulation
	
	$simulation = array();
	
	$accumulator = $botParameters['Accumulator capacity'];
	$accumulatorCapacity = $botParameters['Accumulator capacity'];
	$accumulatorRechargeRate = $botParameters['Accumulator capacity'] / $botParameters['Accumulator recharge time'];
	
	$activations = array();
	foreach($botFitting as $fittedId => $fittedModule) {
		if (isset($fittedModule['Accumulator consumption']) and isset($fittedModule['Cycle time']) and $fittedModule['Active']) {
			for ($i = 0; $i <= 600; $i = $i + $fittedModule['Cycle time']) { // <- round this value to tweak the end result
				@$activations[number_format($i, 1, '.', '')] += $fittedModule['Accumulator consumption'] - ($fittedModule['Accumulator consumption'] * 2);
			}
		}
	}
	
	$accumulatorFailure = false;
	
	for ($i = 0; $i <= 900; $i++) {
		if ($accumulator >= ($accumulator / 2)) { // if accumulator is at/past half
			$b0 = (($accumulatorRechargeRate * 1.5) / ($accumulator / 2)) / -1; // cr * 2 - cr / 2
			$b1 = $accumulatorRechargeRate * 3.5; // cr * 4 - cr / 2
		} else {
			$b0 = (($accumulatorRechargeRate * 1.5) / ($accumulator / 2)) / 1;
			$b1 = $accumulatorRechargeRate / 2;
		}
		$accumulator = bcadd($accumulator, ($b0 * $accumulator) + $b1, 2);
		if ($accumulator > $accumulatorCapacity) {
			$accumulator = $accumulatorCapacity;
		} else {
			$simulation[number_format($i, 1, '.', '')][] = 'Accumulator recharged, now ' . $accumulator . ' AP';
		}
		for ($j = 0; $j <= 0.9; $j = $j + 0.1) {
			if (isset($activations[number_format($i + $j, 1, '.', '')])) {
				$accumulator = bcadd($accumulator, $activations[number_format($i + $j, 1, '.', '')], 2);
				$simulation[number_format($i + $j, 1, '.', '')][] = 'Module activated for ' . @$activations[number_format($i + $j, 1, '.', '')] . ' AP, now ' . $accumulator . ' AP';
			}
			if ($accumulator <= 0) {
				$simulation[number_format($i + $j, 1, '.', '')] = 'Simulation ended, accumulator empty.';
				break;
			}
		}
		if ($accumulator <= 0) {
			$accumulatorFailure = number_format($i + $j, 1, '.', '');
			break;
		}
	}

	
	
	
	// added value
	
	$botParameters['DPS'] = array();
	foreach($botFitting as $fittedId => $fittedModule) {
		if (isset($fittedModule['is weapon']) and $fittedModule['Active']) {
			foreach($botFitting as $_fittedModule) {
				if ($_fittedModule['Group'] == $fittedModule['Ammo/charge type']) {
					$botFitting[$fittedId]['Loaded charge'] = $_fittedModule['Name'];
					if (isset($_fittedModule['Chemical damage'])) @$botParameters['DPS']['Chemical'] += ($_fittedModule['Chemical damage'] * ($fittedModule['Damage'] / 100)) / $fittedModule['Cycle time'];
					if (isset($_fittedModule['Kinetic damage'])) @$botParameters['DPS']['Kinetic']   += ($_fittedModule['Kinetic damage'] * ($fittedModule['Damage'] / 100)) / $fittedModule['Cycle time'];
					if (isset($_fittedModule['Seismic damage'])) @$botParameters['DPS']['Seismic']   += ($_fittedModule['Seismic damage'] * ($fittedModule['Damage'] / 100)) / $fittedModule['Cycle time'];
					if (isset($_fittedModule['Thermal damage'])) @$botParameters['DPS']['Thermal']   += ($_fittedModule['Thermal damage'] * ($fittedModule['Damage'] / 100)) / $fittedModule['Cycle time'];
				}
			}
		}
	}
	
	// var_dump($botParameters);
	// var_dump($botFitting);
	// echo '<pre>'; print_r($matches); echo '</pre>';
	// echo '<pre>'; print_r($botFitting); echo '</pre>';