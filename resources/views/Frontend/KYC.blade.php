@extends('layouts.app')
@section('title', 'X-Pay')
@section('content')
<div id="idensic"></div>
  <script src="<?= $baseUrl ?>/idensic/static/sumsub-kyc.js"></script>
  <script>
var locallang = '{{app()->getLocale()}}';
if(locallang == 'en'){
  var langs = 'en';
} else {
  var langs = 'zh';
}
// ...
var id = idensic.init(
  // selector of the WebSDK container (see above)
  '#idensic',
  // configuration object (see settings in the demo)
  {
    // provide your clientId (can be seen in the demo)
    "clientId": "<?= $clientId ?>",
    // may be some additional parameters, see the Demo to see which ones, e.g.
    "externalUserId": "<?= $userId ?>",
    "accessToken": "<?= $access_token ?>",
    "navConf": {
         "registration": "disabled"
    },
    "uiConf": {
       "lang": langs
        },
  },
  // function for the WebSDK callbacks
   function (messageType, payload) {
     // e.g. just logging the incoming messages
     console.log('[IDENSIC DEMO] Idensic message:', messageType, payload);
   }
)
// ...
</script>
@endsection
