<?php
namespace MariusBezuidenhout\OnePageSurvey;

class OnePageSurvey extends \ExternalModules\AbstractExternalModule {
	public function __construct() {
		parent::__construct();
		// Other code to run when object is instantiated

	}

	public function redcap_every_page_top($project_id) {
		if (PAGE == 'surveys/index.php' && ($_GET['sq']) && !array_key_exists('__return', $_GET)) {
			$url = \ExternalModules\ExternalModules::getUrl( $this->PREFIX, 'survey-page.php' );
            $url .= '&pid=' . $project_id;
            if( isset( $_GET['sq'] ) ) {
                $url .= '&sq=' . $_GET['sq'];
            }
			?>
			<script>
				// let newLocation = 'https://localhost/redcap_v11.4.4/ExternalModules/?prefix=vanderbilt_configurationExample&page=public-page&pid=16&NOAUTH&sq=' + <?php echo $_GET['sq'] ?>;
				window.location = '<?php echo $url ?>';
			</script>
			<?php

		}
	}
}