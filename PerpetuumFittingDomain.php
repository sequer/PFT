<?php

namespace Perpetuum\Fitting\Domain;

class Fitting extends \Apex\Domain\NamedEntity
{
	public $robot;
	public $agent;
	
	public function getRobot()
	{
		return $this->robot;
	}
	
	public function setRobot($robot)
	{
		$this->robot = $robot;
	}
	
	public function getAgent()
	{
		return $this->agent;
	}
	
	public function setAgent($agent)
	{
		$this->agent = $agent;
	}
	
	public function applyHungarianMath()
	{
		// 1. apply modules to bot that are not affected by extensions
		// 2. apply extensions on modules
		// 3. apply modules on bot BEFORE extensions on bot
		// 4. apply extensions on bot
		// 5. apply modules on bot AFTER extensions on bot
		// 6. apply bot bonuses
		// 7. apply modules on bot AFTER extensions and bonuses
		// 8. calculate mass, top speed, CPU/reactor
		// 10. apply cycle time, damage and falloff modifiers (base * n1 * nx)
		// 11. accumulator simulation
		// 12. additional calculations (dps and such)
		
		// TODO extensions: Interference modulation, Convergent electrostatics
		// TODO modules: Repairer tunings, Energy injectors, ERPs, EnWar upgrades, Reactor sealings, ECM tunings, Sensor suppresor tunings
		// TODO sparks (also within agent domain)
		// TODO charges (including transfering missile charge properties to modules)
		// TODO NEXUS
		// TODO active modules
		
		$this->applyModulesPreExtensions();
		$this->applyExtensionsOnModules();
		$this->applyModulesOnRobotBeforeExtenions();
		$this->applyExtensionsOnRobot();
		$this->applyModulesOnRobotAfterExtensions();
		$this->applyRobotBonuses();
		$this->applyModulesOnRobotAfterExtensionsAndBonuses();
		$this->applyRequirements();
	}
	
	private function applyModulesPreExtensions()
	{
		$robot = $this->getRobot();
		
		foreach($robot->getFittedModules() as $module):
			
			// Apply evasive modules
			
			if ($module->hasGroup('Evasive modules')) {
				$value = $robot->getParameter('Surface hit size')->getValue() + $module->getValue('Surface hit size');
				$robot->getParameter('Surface hit size')->setModifiedValue($value);
			}
			
			// Set default damage parameter
			
			if ($module->hasGroup('Turrets') || $module->hasGroup('Ballistics')) {
				if ($module->getParameter('Damage') == false) {
					$parameter = new \Perpetuum\Fitting\Domain\Parameter(null, 'Damage');
					$parameter->setValue(100);
					$module->addParameter($parameter);
				}
			}
			
		endforeach;
	}
	
	private function applyExtensionsOnModules()
	{
		$robot = $this->getRobot();
		$agent = $this->getAgent();
		
		foreach($robot->getFittedModules() as $module):
			
			// Complex jamming electronics
			
			if ($module->hasGroup('ECMs') || $module->hasGroup('Sensor suppressors')) {
				$value = $module->getParameterValue('EW strength') + ($module->getParameterValue('EW strength') * $agent->getExtensionLevel('Complex jamming electronics') * 0.03);
				$module->getParameter('Surface hit size')->setModifiedValue($value);
			}
			
			// Demobilization
			
			if ($module->hasGroup('Demobilizers')) {
				$value = 100 * (((1 + ($module->getParameterValue('Top speed modification') / 100)) / (1 + ($agent->getExtensionLevel('Demobilization') * 0.03))) - 1);
				$module->getParameter('Top speed modification')->setModifiedValue($value);
			}
			
			// Efficient ECM technology
			
			if ($module->hasGroup('ECMs')) {
				$value = $module->getParameterValue('Accumulator consumption') + ($module->getParameterValue('Accumulator consumption') * $agent->getExtensionLevel('Efficient ECM technology') * 0.03);
				$module->getParameter('Accumulator consumption')->setModifiedValue($value);
			}
			
			// Jamming electronics
			
			if ($module->hasGroup('ECMs') || $module->hasGroup('Sensor suppressors')) {
				$value = $module->getParameterValue('EW strength') + ($module->getParameterValue('EW strength') * $agent->getExtensionLevel('Jamming electronics') * 0.03);
				$module->getParameter('Surface hit size')->setModifiedValue($value);
			}
			
			// Long distance electronic warfare
			
			if ($module->hasGroup('Electronic warfare')) {
				$value = $module->getParameterValue('Optimal range') + ($module->getParameterValue('Optimal range') * $agent->getExtensionLevel('Long distance electronic warfare') * 0.03);
				$module->getParameter('Optimal range')->setModifiedValue($value);
			}
			
			// Optimized electronic warfare	
			
			if ($module->hasGroup('Electronic warfare')) {
				$value = $module->getParameterValue('CPU usage') + ($module->getParameterValue('CPU usage') * $agent->getExtensionLevel('Optimized electronic warfare') * -0.03);
				$module->getParameter('CPU usage')->setModifiedValue($value);
			}
			
			// Optimized signal detection
			
			if ($module->hasGroup('Signal detectors')) {
				$value = $module->getParameterValue('CPU usage') + ($module->getParameterValue('CPU usage') * $agent->getExtensionLevel('Optimized signal detection') * -0.03);
				$module->getParameter('CPU usage')->setModifiedValue($value);
			}
			
			// Optimized signal masking
			
			if ($module->hasGroup('Signal maskers')) {
				$value = $module->getParameterValue('CPU usage') + ($module->getParameterValue('CPU usage') * $agent->getExtensionLevel('Optimized signal masking') * -0.03);
				$module->getParameter('CPU usage')->setModifiedValue($value);
			}
			
			// Remote sensor amplification
			
			if ($module->hasGroup('Remote sensor amplifiers')) {
				$value = $module->getParameterValue('Accumulator usage') + ($module->getParameterValue('Accumulator usage') * $agent->getExtensionLevel('Remote sensor amplification') * -0.05);
				$module->getParameter('CPU usage')->setModifiedValue($value);
			}
			
			// Sensor connection
			
			if ($module->hasGroup('Sensor amplifiers') || $module->hasGroup('Remote sensor amplifiers')) {
				$value = 100 * (((1 + ($module->getParameterValue('Locking time') / 100)) / (1 + ($agent->getExtensionLevel('Sensor connection') * 0.02))) - 1);
				$module->getParameter('Locking time')->setModifiedValue($value);
			}
			
			// Sensor suppressing
			
			if ($module->hasGroup('Sensor suppressors')) {
				$value = ((1 + ($module->getParameterValue('Locking time') / 100)) * (1 + ($agent->getExtensionLevel('Sensor suppressing') * 0.03)) - 1) * 100;
				$module->getParameter('Locking time')->setModifiedValue($value);
			}
			
			// Signal detection
			
			if ($module->hasGroup('Signal detectors')) {
				$value = 100 * (((1 + ($module->getParameterValue('Signal detection modification') / 100)) * (1 + ($agent->getExtensionLevel('Signal detection') * 0.02))) - 1);
				$module->getParameter('Signal detection modification')->setModifiedValue($value);
			}
			
			// Signal masking
			
			if ($module->hasGroup('Signal maskers')) {
				$value = 100 * (((1 + ($module->getParameterValue('Signal masking modification') / 100)) * (1 + ($agent->getExtensionLevel('Signal masking') * 0.02))) - 1);
				$module->getParameter('Signal masking modification')->setModifiedValue($value);
			}
			
			// Accelerated armor repair
			
			if ($module->hasGroup('Armor repairers') || $module->hasGroup('Remote armor repairers')) {
				$module->addExtensionModifier('Cycle time', $agent->getExtensionLevel('Accelerated armor repair') * 0.05);
			}
			
			// Economical armor usage
			
			if (
				$module->hasGroup('Armor plates') || $module->hasGroup('Armor hardeners') ||
				$module->hasGroup('Armor repairers') || $module->hasGroup('Remote armor repairers') || $module->hasGroup('Armor repairer tunings')
			) {
				$value = $module->getParameterValue('Reactor usage') + ($module->getParameterValue('Reactor usage') * $agent->getExtensionLevel('Economical armor usage') * -0.03);
				$module->getParameter('Reactor usage')->setModifiedValue($value);
			}
			
			// Economical shield usage
			
			if ($module->hasGroup('Shield generators')) {
				$value = $module->getParameterValue('Reactor usage') + ($module->getParameterValue('Reactor usage') * $agent->getExtensionLevel('Economical shield usage') * -0.03);
				$module->getParameter('Reactor usage')->setModifiedValue($value);
			}
			
			// Economical weapon usage
			
			if ($module->hasGroup('Turrets') || $module->hasGroup('Ballistics')) {
				$value = $module->getParameterValue('Reactor usage') + ($module->getParameterValue('Reactor usage') * $agent->getExtensionLevel('Economical weapon usage') * -0.03);
				$module->getParameter('Reactor usage')->setModifiedValue($value);
			}
			
			// Efficient energy transfer
			
			if ($module->hasGroup('Energy transferers')) {
				$value = $module->getParameterValue('Accumulator consumption') + ($module->getParameterValue('Accumulator consumption') * $agent->getExtensionLevel('Efficient energy transfer') * -0.05);
				$module->getParameter('Accumulator consumption')->setModifiedValue($value);
			}
			
			// Improved armor repair
			
			if ($module->hasGroup('Armor repairers') || $module->hasGroup('Remote armor repairers')) {
				$value = $module->getParameterValue('Repair') + ($module->getParameterValue('Repair') * $agent->getExtensionLevel('Improved armor repair') * 0.02);
				$module->getParameter('Repair')->setModifiedValue($value);
			}
			
			// Improved energy drain
			
			if ($module->hasGroup('Energy drainers')) {
				$value = $module->getParameterValue('Drained energy') + ($module->getParameterValue('Drained energy') * $agent->getExtensionLevel('Improved energy drain') * 0.02);
				$module->getParameter('Drained energy')->setModifiedValue($value);
			}
			
			// Improved energy neutralization
			
			if ($module->hasGroup('Energy neutralizers')) {
				$value = $module->getParameterValue('Neutralized energy') + ($module->getParameterValue('Neutralized energy') * $agent->getExtensionLevel('Improved energy neutralization') * 0.02);
				$module->getParameter('Neutralized energy')->setModifiedValue($value);
			}
			
			// Improved shield technology
			
			if ($module->hasGroup('Shield generators')) {
				$value = 2 * (1 + ($agent->getExtensionLevel('Improved shield technology') * 0.03));
				$module->getParameter('Shield absorption')->setModifiedValue($value);
				
				// Search for shield hardener(s)
				
				foreach($robot->getFittedModules() as $candidate) {
					if ($candidate->hasGroup('Shield hardeners')) {
						$value = $module->getParameterValue('Shield absorption') * (1 + ($candidate->getParameterValue('Shield absorption') / 100));
						$module->getParameter('Shield absorption')->setModifiedValue($value);
					}
				}
				
				$value = ((1 / $module->getParameterValue('Shield absorption')) / $module->getParameterValue('Shield radius')) * $robot->getParameterValue('Surface hit size');
				$module->getParameter('Absorption ratio')->setModifiedValue($value);
			}
			
			// Long range engineering
			
			if ($module->hasGroup('Engineering equipment')) {
				$value = $module->getParameterValue('Optimal range') + ($module->getParameterValue('Optimal range') * $agent->getExtensionLevel('Long range engineering') * 0.03);
				$module->getParameter('Optimal range')->setModifiedValue($value);
			}
			
			// Optimized armor usage
			
			if (
				$module->hasGroup('Armor plates') || $module->hasGroup('Armor hardeners') ||
				$module->hasGroup('Armor repairers') || $module->hasGroup('Remote armor repairers') || $module->hasGroup('Armor repairer tunings')
			) {
				$value = $module->getParameterValue('CPU usage') + ($module->getParameterValue('CPU usage') * $agent->getExtensionLevel('Optimized armor usage') * -0.03);
				$module->getParameter('CPU usage')->setModifiedValue($value);
			}
			
			// Optimized engineering
			
			if ($module->hasGroup('Engineering equipment')) {
				$value = $module->getParameterValue('CPU usage') + ($module->getParameterValue('CPU usage') * $agent->getExtensionLevel('Optimized engineering') * -0.03);
				$module->getParameter('CPU usage')->setModifiedValue($value);
			}
			
			// Optimized shield usage
			
			if ($module->hasGroup('Shield generators')) {
				$value = $module->getParameterValue('CPU usage') + ($module->getParameterValue('CPU usage') * $agent->getExtensionLevel('Optimized shield usage') * -0.03);
				$module->getParameter('CPU usage')->setModifiedValue($value);
			}
			
			// Optimized weapon usage
			
			if ($module->hasGroup('Turrets') || $module->hasGroup('Ballistics')) {
				$value = $module->getParameterValue('CPU usage') + ($module->getParameterValue('CPU usage') * $agent->getExtensionLevel('Economical weapon usage') * -0.03);
				$module->getParameter('CPU usage')->setModifiedValue($value);
			}
			
			// Remote armor repair
			
			if ($module->hasGroup('Remote repairer')) {
				$value = $module->getParameterValue('Accumulator consumption') + ($module->getParameterValue('Accumulator consumption') * $agent->getExtensionLevel('Remote armor repair') * -0.03);
				$module->getParameter('Accumulator consumption')->setModifiedValue($value);
			}
			
			// Advanced ballistics
			
			if ($module->hasGroup('Medium missile launchers')) {
				$module->addExtensionModifier('Damage', $agent->getExtensionLevel('Advanced ballistics') * 0.03);
			}
			
			// Advanced kinematics
			
			if ($module->hasGroup('Medium firearms')) {
				$module->addExtensionModifier('Damage', $agent->getExtensionLevel('Advanced kinematics') * 0.03);
			}
			
			// Advanced magnetostatics
			
			if ($module->hasGroup('Medium magnetic weapons')) {
				$module->addExtensionModifier('Damage', $agent->getExtensionLevel('Advanced magnetostatics') * 0.03);
			}
			
			// Advanced optics
			
			if ($module->hasGroup('Medium lasers')) {
				$module->addExtensionModifier('Damage', $agent->getExtensionLevel('Advanced optics') * 0.03);
			}
			
			// Basic ballistics
			
			if ($module->hasGroup('Small missile launchers')) {
				$module->addExtensionModifier('Damage', $agent->getExtensionLevel('Basic ballistics') * 0.03);
			}
			
			// Basic kinematics
			
			if ($module->hasGroup('Small firearms')) {
				$module->addExtensionModifier('Damage', $agent->getExtensionLevel('Basic firearms') * 0.03);
			}
			
			// Basic magnetostatics
			
			if ($module->hasGroup('Small magnetic weapons')) {
				$module->addExtensionModifier('Damage', $agent->getExtensionLevel('Basic magnetic weapons') * 0.03);
			}
			
			// Basic optics
			
			if ($module->hasGroup('Small lasers')) {
				$module->addExtensionModifier('Damage', $agent->getExtensionLevel('Basic lasers') * 0.03);
			}
			
			// Complex missile launch
			
			if ($module->hasGroup('Ballistics')) {
				$module->addExtensionModifier('Cycle time', $agent->getExtensionLevel('Complex missile launch') * 0.03);
			}
			
			// General firing
			
			if ($module->hasGroup('Turrets')) {
				$module->addExtensionModifier('Damage', $agent->getExtensionLevel('General firing') * 0.01);
			}
			
			// Improved falloff
			
			if ($module->hasGroup('Turrets')) {
				$module->addExtensionModifier('Falloff', $agent->getExtensionLevel('Improved falloff') * 0.03);
			}
			
			// Missile launch
			
			if ($module->hasGroup('Ballistics')) {
				$module->addExtensionModifier('Cycle time', $agent->getExtensionLevel('Missile launch') * 0.01);
			}
			
			// Precision firing
			
			if ($module->hasGroup('Turrets')) {
				$value = $module->getParameterValue('Hit dispersion') + ($module->getParameterValue('Hit dispersion') * $agent->getExtensionLevel('Precision firing') * -0.03);
				$module->getParameter('Hit dispersion')->setModifiedValue($value);
			}
			
			// Propellant mixing
			
			if ($module->hasGroup('Ballistics')) {
				$value = $module->getParameterValue('Optimal range modification') + ($agent->getExtensionLevel('Propellant mixing') * 3);
				$module->getParameter('Optimal range modification')->setModifiedValue($value);
			}
			
			// Rapid-firing
			
			if ($module->hasGroup('Turrets')) {
				$module->addExtensionModifier('Cycle time', $agent->getExtensionLevel('Rapid-firing') * 0.03);
			}
			
			// Seismics
			
			if ($module->hasGroup('Ballistics')) {
				$value = $module->getParameterValue('Explosion size modification') + ($agent->getExtensionLevel('Seismics') * 3);
				$module->getParameter('Explosion size modification')->setModifiedValue($value);
			}
			
			// Sharpshooting
			
			if ($module->hasGroup('Turrets')) {
				$value = $module->getParameterValue('Optimal range') * (1 + ($agent->getExtensionLevel('Sharpshooting') * 0.03));
				$module->getParameter('Optimal range')->setModifiedValue($value);
			}
			
			// Target analysis
			
			if ($module->hasGroup('Turrets') || $module->hasGroup('Ballistics')) {
				$module->addExtensionModifier('Damage', $agent->getExtensionLevel('Target analysis') * 0.01);
			}
			
		endforeach;
	}
	
	private function applyModulesOnRobotBeforeExtenions()
	{
		$robot = $this->robot;
		
		foreach($robot->getFittedModules() as $module):
		
			if ($module->hasGroup('Armor plates')) {
				$robot->getParameter('Surface hit size')->setModifiedValue($robot->getParameterValue('Surface hit size') + $module->getParameterValue('Surface hit size'));
				$robot->getParameter('Armor')->setModifiedValue($robot->GetParameterValue('Armor') + $module->getParameterValue('Armor'));
				$robot->getParameter('Armor status')->setModifiedValue($robot->getParameterValue('Armor')); // alias
			}
			
			if ($module->hasGroup('Auxiliary accumulators')) {
				$robot->getParameter('Accumulator capacity')->setValue($robot->getParameterValue('Accumulator capacity') + $module->getParameterValue('Accumulator capacity')); // change base value for the robot
				$robot->getParameter('Accumulator')->setValue($robot->getParameterValue('Accumulator capacity')); // alias
			}
			
		endforeach;
	}
	
	private function applyExtensionsOnRobot()
	{
		$robot = $this->getRobot();
		$agent = $this->getAgent();
		
		// Accelerated target locking
		
		$value = $robot->getParameter('Locking time')->getBase() / (1 + ($agent->getExtensionLevel('Accelerated target locking') * 0.05));
		$robot->getParameter('Locking time')->setModifiedValue($value);
		
		// Data processing
		
		$value = $robot->getParameterValue('CPU performance') + ($robot->getParameterBaseValue('CPU performance') * $agent->getExtensionLevel('Data processing') * 0.03);
		$robot->getParameter('CPU performance')->setModifiedValue($value);
		
		// Long range targeting
		
		$value = $robot->getParameterValue('Locking range') + ($robot->getParameterBaseValue('Locking range') * $agent->getExtensionLevel('Long range targeting') * 0.05);
		$robot->getParameter('Locking range')->setModifiedValue($value);
		
		// Targeting
		
		$robot->getParameter('Maximum targets')->setModifiedValue(1 + $agent->getExtensionLevel('Targeting'));
		if ($robot->getParameterValue('Maximum targets') > $robot->getParameterBaseValue('Maximum targets')) {
			$robot->getParameter('Maximum targets')->setModifiedValue($robot->getParameterBaseValue('Maximum targets'));
		}
		
		// Accelerated reloading
		
		$value = $robot->getParameterValue('Ammunition reload time') - ($robot->getParameterBaseValue('Ammunition reload time') * $agent->getExtensionLevel('Accelerated reloading') * 0.05); 
		$robot->getParameter('Ammunition reload time')->setModifiedValue($value);
		
		// Accumulator expansion
		
		$value = $robot->getParameterValue('Accumulator capacity') + ($robot->getParameterValue('Accumulator capacity') * $agent->getExtensionLevel('Accumulator expansion') * 0.03);
		$robot->getParameter('Accumulator capacity')->setModifiedValue($value);
		$robot->getParameter('Accumulator')->setModifiedValue($value);
		
		// Complex mechanics & mechanics
		
		$value = $robot->getParameterValue('Armor') + ($robot->getParameterValue('Armor') * $agent->getExtensionLevel('Complex mechanics') * 0.05) + ($robot->getParameterValue('Armor') * $agent->getExtensionLevel('Mechanics') * 0.02);
		$robot->getParameter('Armor')->setModifiedValue($value);
		$robot->getParameter('Armor status')->setModifiedValue($value);
		
		// Energy management
		
		$value = $robot->getParameterValue('Accumulator recharge time') - ($robot->getParameterBaseValue('Accumulator recharge time') * $agent->getExtensionLevel('Energy management') * 0.03);
		$robot->getParameter('Accumulator recharge time')->setModifiedValue($value);
		
		// Reactor expansion
		
		$value = $robot->getParameterValue('Reactor performance') + ($robot->getParameterBaseValue('Reactor performance') * $agent->getExtensionLevel('Reactor expansion') * 0.03);
		$robot->getParameter('Reactor performance')->setModifiedValue($value);
		$robot->getParameter('Available reactor performance')->setModifiedValue($value);
		
		// Critical hit
		
		$robot->getParameter('Critical hit chance')->setModifiedValue(1 + $agent->getExtensionLevel('Critical hit'));
		
		// Missile guidance
		
		$robot->getParameter('Missile guidance accuracy')->setModifiedValue($robot->getParameterBaseValue('Missile guidance accuracy') + $agent->getExtensionLevel('Missile guidance'));
	}
	
	private function applyModulesOnRobotAfterExtensions()
	{
		$robot = $this->robot;
		
		foreach($robot->getFittedModules() as $module):
			
			if ($module->hasGroup('Armor plates') || $module->hasGroup('Lightweight frames')) {
				$robot->getParameter('Demobilizer resistance')->setModifiedValue($robot->getParameterValue('Demobilizer resistance') + $module->getParameterValue('Demobilizer resistance'));
			}
			
			if ($module->hasGroup('Armor hardeners')) {
				$robot->getParameter('Passive chemical resistance')->setModifiedValue($robot->getParameterValue('Passive chemical resitance') + $module->getParameterValue('Passive chemical resistance'));
				$robot->getParameter('Passive kinetic resistance')->setModifiedValue($robot->getParameterValue('Passive kinetic resitance') + $module->getParameterValue('Passive kinetic resistance'));
				$robot->getParameter('Passive seismic resistance')->setModifiedValue($robot->getParameterValue('Passive seismic resitance') + $module->getParameterValue('Passive seismic resistance'));
				$robot->getParameter('Passive thermal resistance')->setModifiedValue($robot->getParameterValue('Passive thermal resitance') + $module->getParameterValue('Passive thermal resistance'));
			}
			
			if ($module->hasGroup('Lightweight frames')) {
				$robot->getParameter('Armor')->setModifiedValue($robot->getParameterValue('Armor') * (($module->getParameterValue('Armor hit points') / 100) + 1));
				$robot->getParameter('Armor status')->setModifiedValue($robot->getParameterValue('Armor')); // alias
				$robot->getParameter('Mass')->setModifiedValue($robot->getParameterBaseValue('Armor') * (($module->getParameterValue('Mass') / 100) + 1));
				$module->getParameter('Mass')->setModifiedValue(2);
			}
			
			if ($module->hasGroup('Shield generators')) {
				if ($module->getParameterValue('Shield radius') > $robot->getParameterValue('Surface hit size')) {
					$module->getParameter('Absorption ratio')->setModifiedValue(($module->getParameterValue('Absorption ratio') / $module->getParameterValue('Shield radius')) * $robot->getParameterValue('Surface hit size'));
				}
			}
			
			if ($module->hasGroup('Accumulator rechargers')) {
				$robot->getParameter('Accumulator recharge time')->setModifiedValue($robot->getParameterValue('Accumulator recharge time') * (($module->getParameterValue('Accumulator recharge time') / 100) + 1));
			}
			
			if ($module->hasGroup('Coreactors')) {
				$robot->getParameter('Reactor performance')->setModifiedValue($robot->getParameterValue('Reactor performance') * ($module->getParameterValue('Reactor performance') / 100));
				$robot->getParameter('Available reactor performance')->setModifiedValue($robot->getParameterValue('Reactor performance')); // alias, used for fitting requirements
			}
			
			if ($module->hasGroup('Sensor amplifiers')) {
				$robot->getParameter('Locking range')->setModifiedValue($robot->getParameterValue('Locking range') * (1 + ($module->getParameterValue('Locking range') / 100)));
				$robot->getParameter('Locking time')->setModifiedValue($robot->getParameterValue('Locking time') - ($robot->getParameterValue('Locking time') * (($module->getParameterValue('Locking time') * -1) / 100)));
			}
			
			if ($module->hasGroup('Coprocessors')) {
				$robot->getParameter('CPU performance')->setModifiedValue($robot->getParameterValue('CPU performance') * (1 + ($module->getParameterValue('CPU performance') / 100)));
				$robot->getParameter('Available CPU performance')->setModifiedValue($robot->getParameterValue('CPU performance')); // alias, used for fitting requirements
			}
			
			if ($module->hasGroup('Range extenders')) {
				foreach($robot->getFittedModules() as $candidate) {
					$candidate->getParameter('Optimal range')->setModifiedValue($candidate->getParameterValue('Optimal range') * (1 + ($module->getParameterValue('Optimal range modifier') / 100)));
				}
			}
			
			if ($module->hasGroup('Signal detectors')) {
				$robot->getParameter('Signal detection')->setModifiedValue($robot->getParameterValue('Signal detection') * (1 + ($module->getParameterValue('Signal detection modification') / 100)));
			}
			
			if ($module->hasGroup('Signal maskers')) {
				$robot->getParameter('Signal masking')->setModifiedValue($robot->getParameterValue('Signal masking') * (1 + ($module->getParameterValue('Signal masking modification') / 100)));
			}
			
			if ($module->hasGroup('ECCMs')) {
				$robot->getParameter('Sensor strength')->setModifiedValue($robot->getParameterValue('Sensor strength') * (1 + ($module->getParameterValue('Sensor strength') / 100)));
			}
			
			if ($module->hasGroup('Magnetic weapon tunings')) {
				foreach($robot->getFittedModules() as $candidate) {
					if ($candidate->hasGroup('Magnetic weapon turrets')) {
						$candidate->addTunerModifier('Damage', (1 + ($candidate->getParameterValue('Damage') / 100)));
						$candidate->addTunerModifier('Cycle time', (1 + ($candidate->getParameterValue('Magnetic weapon cycle time') / 100)));
					}
				}
			}
			
			if ($module->hasGroup('Firearm tunings')) {
				foreach($robot->getFittedModules() as $candidate) {
					if ($candidate->hasGroup('Firearm turrets')) {
						$candidate->addTunerModifier('Damage', (1 + ($candidate->getParameterValue('Damage') / 100)));
						$candidate->addTunerModifier('Cycle time', (1 + ($candidate->getParameterValue('Cycle time') / 100)));
					}
				}
			}
			
			if ($module->hasGroup('Laser tunings')) {
				foreach($robot->getFittedModules() as $candidate) {
					if ($candidate->hasGroup('Laser turrets')) {
						$candidate->addTunerModifier('Damage', (1 + ($candidate->getParameterValue('Damage') / 100)));
						$candidate->addTunerModifier('Cycle time', (1 + ($candidate->getParameterValue('Laser cycle time') / 100)));
					}
				}
			}
			
			if ($module->hasGroup('Missile launcher tunings')) {
				foreach($robot->getFittedModules() as $candidate) {
					if ($candidate->hasGroup('Ballistics')) {
						$candidate->addTunerModifier('Damage', (1 + ($candidate->getParameterValue('Damage') / 100)));
						$candidate->addTunerModifier('Cycle time', (1 + ($candidate->getParameterValue('Missile launcher cycle time') / 100)));
					}
				}
			}
			
		endforeach;
	}
	
	private function applyRobotBonuses()
	{
		$robot = $this->getRobot();
		$agent = $this->getAgent();
		
		foreach($robot->getBonuses() as $bonus) {
			$parameter = $bonus->getParameter()->getName();
			$multiplier = $agent->getExtensionLevel($bonus->getExtension()->getName()) * $bonus->getBonus();
			
			if ($bonus->getApply() == 'Robot') {
				switch($parameter):
				
					case 'Critical hit chance':
						
						break;
					
					case 'Signal masking':
						
						break;
					
					case 'Armor':
						
						break;
					
					case 'Surface hit size':
						
						break;
					
					case 'Accumulator capacity':
						$robot->getParameter('Accumulator capacity')->setModifiedValue($robot->getParameterValue('Accumulator capacity') + ($robot->getParameterBaseValue('Accumulator capacity') * $multiplier));
						break;
					
					case 'Accumulator recharge time':
						$robot->getParameter('Accumulator recharge time')->setModifiedValue($robot->getParameterValue('Accumulator recharge time') - ($robot->getParameterBaseValue('Accumulator recharge time') * $multiplier));
						break;
					
					case 'Locking time':
						$robot->getParameter('Locking time')->setModifiedValue($robot->getParameterBaseValue('Locking time') / (1 + ($agent->getExtensionLevel('Accelerated target locking') * 0.05) + $multiplier)); // see: http://forums.perpetuum-online.com/post/11277/#p11277
						break;
					
					case 'Passive chemical resistance':
						$robot->getParameter('Passive chemical resistance')->setModifiedValue($robot->getParameterValue('Passive chemical resistance') * (1 + $multiplier));
						break;
					
					case 'Passive seismic resistance':
						$robot->getParameter('Passive seismic resistance')->setModifiedValue($robot->getParameterValue('Passive seismic resistance') * (1 + $multiplier));						
						break;
					
					case 'Passive kinetic resistance':
						$robot->getParameter('Passive kinetic resistance')->setModifiedValue($robot->getParameterValue('Passive kinetic resistance') * (1 + $multiplier));						
						break;
					
					case 'Passive thermal resistance':
						$robot->getParameter('Passive thermal resistance')->setModifiedValue($robot->getParameterValue('Passive thermal resistance') * (1 + $multiplier));
						break;
					
				endswitch;
			}	
			else {
				foreach($robot->getFittedModules() as $module):
					if ($module->hasGroup($bonus->getTarget()) && $module->hasParameter($parameter)) {
						switch($parameter):
						
							case 'Hit dispersion':
								
								break;
							
							case 'Mined amount':
								
								break;
							
							case 'Harvested amount':
								
								break;
							
							case 'EW strength':
								
								break;
							
							case 'Accumulator usage':
								
								break;
							
							case 'Industrial module accumulator usage':
								
								break;
							
							case 'Locking range':
								
								break;
							
							case 'Locking time':
								
								break;
							
							case 'Neutralized energy':
								
								break;
							
							case 'CPU usage':
								
								break;
							
							case 'Cycle time':
								$module->addExtensionModifier('Cycle time', $multiplier);
								break;
							
							case 'Damage':
								$module->addExtensionModifier('Damage', $multiplier);
								break;
							
							case 'Falloff':
								$module->addExtensionModifier('Falloff', $multiplier);
								break;
							
							case 'Optimal range':
								$module->addExtensionModifier('Optimal range', $multiplier);
								break;
							
							case 'Optimal range modification':
								
								break;
							
							case 'Repair':
								$module->getParameter('Repair')->setModifiedValue($module->getParameterValue('Repair') + ($module->getParameterValue('Repair') * $multiplier));
								break;
							
							case 'Geoscanner accuracy':
								$module->getParameter('Geoscanner accuracy')->setModifiedValue($module->getParameterValue('Geoscanner accuracy') * (1 + (($agent->getExtensionLevel('Basic geochemistry') * 0.045) + $multiplier)));
								break;
							
						endswitch;
					}
				endforeach;
			}
		}
	}
	
	private function applyModulesOnRobotAfterExtensionsAndBonuses()
	{
		$robots = $this->getRobot();
		
		foreach($robot->getFittedModules() as $module):
			if ($module->hasGroup('Armor hardeners')) {
				$robot->getParameter('Passive chemical resistance')->setModifiedValue($robot->getParameterValue('Passive chemical resistance') + $module->getParameterValue('Active chemical resistance'));
				$robot->getParameter('Passive kinetic resistance')->setModifiedValue($robot->getParameterValue('Passive kinetic resistance') + $module->getParameterValue('Active kinetic resistance'));
				$robot->getParameter('Passive seismic resistance')->setModifiedValue($robot->getParameterValue('Passive seismic resistance') + $module->getParameterValue('Active seismic resistance'));
				$robot->getParameter('Passive thermal resistance')->setModifiedValue($robot->getParameterValue('Passive thermal resistance') + $module->getParameterValue('Active thermal resistance'));
			}
		endforeach;
	}
	
	private function applyRequirements()
	{
		$robot = $this->getRobot();
		
		foreach($robot->getFittedModules() as $module):
			$robot->getParameter('Available CPU performance')->setModifiedValue($robot->getParameterValue('Available CPU performance') - $module->getParameterValue('CPU usage'));
			$robot->getParameter('Available reactor performance')->setModifiedValue($robot->getParameterValue('Available reactor performance') - $module->getParameterValue('Reactor usage'));
			$robot->getParameter('Mass')->setModifiedValue($robot->getParameterValue('Mass') - $module->getParameterValue('Mass'));
		endforeach;
		
		$robot->getParameter('Top speed')->setModifiedValue(($robot->getParameterBaseValue('Mass') / $robot->getParameterValue('Mass')) * $robot->getParameterValue('Top speed'));
	}
	
	public function getCpuUsage()
	{
		
	}
	
	public function getReactorUsage()
	{
		
	}
	
	public function getAccumulatorUsage()
	{
		
	}
	
	public function getTopSpeed()
	{
		
	}
	
	public function getKineticDps()
	{
		
	}
	
	public function getThermalDps()
	{
		
	}
	
	public function getSeismicDps()
	{
		
	}
	
	public function getChemicalDps()
	{
		
	}
	
	public function getCombinedDps()
	{
		
	}
}

abstract class Item extends \Apex\Domain\NamedEntity
{
	protected $parameters = array();
	protected $groups = array();
	
	public function addParameter($parameter)
	{
		$this->parameters[$parameter->getId()] = $parameter;
	}
	
	public function hasParameter($name)
	{
		foreach($this->parameters as $parameter) {
			if ($parameter->getName() == $name) return true;
		}
		return false;
	}
	
	public function getParameter($name)
	{
		foreach($this->parameters as $parameter) {
			if ($parameter->getName() == $name) return $parameter;
		}
		return new \Perpetuum\Fitting\Domain\Parameter(null, $name); // prevents exceptions for non-existent parameters
	}
	
	public function getParameterValue($name)
	{
		if ($parameter = $this->getParameter($name)) return $parameter->getValue();
		else return null;
	}
	
	public function getParameterBaseValue($name)
	{
		if ($parameter = $this->getParameter($name)) return $parameter->getBase();
		else return null;
	}
	
	public function addGroup($group)
	{
		$this->groups[$group->getName()] = $group;
	}
	
	public function hasGroup($name)
	{
		return isset($this->groups[$name]);
	}
}

class Robot extends Item
{
	protected $fitting = array();
	protected $cargo = array();
	protected $bonuses = array();
	
	public function addItem($item)
	{
		if (is_a($item, 'Perpetuum\Fitting\Domain\Charge')) {
			$this->cargo[] = $item;
		}
		else {
			$this->fitting[] = $item;
		}
	}
	
	public function getFittedModules()
	{
		return $this->fitting;
	}
	
	public function addBonus($bonus)
	{
		$this->bonuses[] = $bonus;
	}
	
	public function getBonuses()
	{
		return $this->bonuses;
	}
}

class RobotBonus
{
	private $extension;
	private $parameter; // effect
	private $bonus;
	private $target;
	
	public function setExtension($extension)
	{
		$this->extension = $extension;
	}
	
	public function getExtension()
	{
		return $this->extension;
	}
	
	public function setParameter($parameter)
	{
		$this->parameter = $parameter;
	}
	
	public function getParameter()
	{
		return $this->parameter;
	}
	
	public function setBonus($bonus)
	{
		$this->bonus = $bonus;
	}
	
	public function getBonus()
	{
		return $this->bonus;
	}
	
	public function setTarget($target)
	{
		$this->target = $target;
	}
	
	public function getTarget()
	{
		return $this->target;
	}
}

class Module extends Item
{
	protected $active = true;
	protected $modifiers = array(
		'Cycle time' => array(
			'Extensions' => 0,
			'Tuners' => array()
		),
		'Damage' => array(
			'Extensions' => array(),
			'Tuners' => array()
		),
		'Falloff' => array(
			'Extensions' => 0,
			'Tuners' => array()
		)
	);
	
	public function setActive($active)
	{
		$this->active = empty($active) ? false : true;
	}
	
	public function getActive()
	{
		return $this->active;
	}
	
	public function addExtensionModifier($parameterName, $value) // have these methods deal directly with the parameter instances instead of their names?
	{ 
		if ($parameterName == 'Cycle time' || $parameterName == 'Falloff') $this->modifiers[$parameterName]['Extensions'] += $value;
		else $this->modifiers[$parameterName]['Extensions'][] = $value;
	}
	
	public function addTunerModifier($parameterName, $value)
	{
		$this->modifiers[$parameterName]['Tuners'][] = $value;
	}
}

class Charge extends Item
{
	
}

class Parameter extends \Apex\Domain\NamedEntity
{
	protected $value;
	protected $base;
	
	public function setValue($value)
	{
		$this->value = $value;
		$this->base = $value;
	}
	
	public function setModifiedValue($value)
	{
		$this->value = $value;
	}
	
	public function getValue()
	{
		return $this->value;
	}
	
	public function getBase()
	{
		return $this->base;
	}
}

class Group extends \Apex\Domain\NamedEntity
{
	
}
