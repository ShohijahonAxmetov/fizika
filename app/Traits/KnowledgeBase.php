<?php

namespace App\Traits;

use App\Models\PhysicalMagnitude;

trait KnowledgeBase
{
	function handle($request)
	{
		$data = $request->except('q');
		$q = $request->input('q');

		$qPM = $this->getPhysicalMagnitude($q);

		$qPMRequiredPMGroups = $qPM->requiredPhysicalMagnitudesGroup;

		$temp = [];
		foreach ($qPMRequiredPMGroups as $qPMRequiredPMGroup) {
			foreach ($qPMRequiredPMGroup->required_physical_magnitude_ids as $requiredPM) {
				$temp[] = PhysicalMagnitude::findOrFail($requiredPM);
			}

			foreach ($temp as $item) {
				if (!in_array($item->uniqueDesignation, array_keys($data))) dd('o\'xshamadi!');
			}

			dd($qPMRequiredPMGroup->action);
			$str = "15/3";
			dd(eval('return '.$str.';'));
		}

		dd($qPMRequiredPM);
	}

	function getPhysicalMagnitude(string $uniqueDesignation)
	{
		return PhysicalMagnitude::where('uniqueDesignation', $uniqueDesignation)
			->first();
	}
}



function getNotEnoughInformationMessage()
{
	return 'Not enough information';
}