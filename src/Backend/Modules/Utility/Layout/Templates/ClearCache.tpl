{include:{$BACKEND_CORE_PATH}/Layout/Templates/Head.tpl}
{include:{$BACKEND_CORE_PATH}/Layout/Templates/StructureStartModule.tpl}

<div class="pageTitle">
	<h2>{$lblClearCache|ucfirst}</h2>
</div>

{form:settings}

	
	{option:cleared}
		<p>Last cleared on: {$cleared|date:'d/m/Y H:i:s'}.</p>
	{/option:cleared}
	{option:!cleared}
		<p>No clears have been done.</p>
	{/option:!cleared}
		 

	<div>
		<a class="submitButton button  mainButton" href="#">
			<span>{$lblClear|ucfirst}</span>
		</a>
	</div>


{/form:settings}

{include:{$BACKEND_CORE_PATH}/Layout/Templates/StructureEndModule.tpl}
{include:{$BACKEND_CORE_PATH}/Layout/Templates/Footer.tpl}
