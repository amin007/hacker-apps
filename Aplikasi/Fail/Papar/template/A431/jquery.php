<!-- khas untuk jquery dan js2 lain
================================================== -->
<script type="text/javascript" src="<?=JQUERY?>"></script>
<script type="text/javascript" src="<?=BOOTSTRAPJS431?>"></script>
<?php
if (isset($this->js))
{
    foreach ($this->js as $js)
    {
        echo "\n";
		/*?><script type="text/javascript" src="<?php echo SUMBER . $js ?>"></script><?php*/
		?><script type="text/javascript" src="<?php echo $js ?>"></script><?php
    }
}
?>