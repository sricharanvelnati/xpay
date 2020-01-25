@extends('layouts.app')
@section('title', 'UBank')
@section('content')
<h1 class="color-red">KYC Verification</h1>
<? if ($applicantId && $accessToken) { ?>
  <div id="idensic"></div>
	<script src="<?= $baseUrl ?>/idensic/static/idensic.js"></script>
	  <script>
		var id = idensic.init(
		  '#idensic',
		  {
			accessToken: '<?=$accessToken?>',
			applicantId: '<?=$applicantId?>',
			uiConf: { "customLogoUrl": "" }
		  },
		  function (messageType, payload) {
			// idCheck.onReady, idCheck.onResize, idCheck.onCancel, idCheck.onSuccess, idCheck.onApplicantCreated
			console.log('[IDENSIC DEMO] Idensic message:', messageType, payload);
			// resizing iframe to the inner content size
			if (messageType == 'idCheck.onResize') {
			  idensic.iframe.height = payload.height;
			}
		  }
		);
	  </script>
	<? } else { ?>
	  <div style="color: red; text-align: center;">
		  <?= $accessTokenError; ?><br/>
		  <?= $applicantIdError; ?>
	  </div>
	<? } ?>
	<? if ($uploadProfileImageError) { ?>
	  <div style="color: red; text-align: center;">
		  <?= $uploadProfileImageError; ?>
	  </div>
	<? } ?>
@endsection
