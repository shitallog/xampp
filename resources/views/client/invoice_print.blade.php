<html style="font-size: 100%"><head>
  <title>Invoice</title>
  <script type="text/javascript">
    var onLoadCallback = function () { }
    var isLoaded = false

    function setLoadCallback(callback) {
      onLoadCallback = callback
      if (isLoaded) {
        onLoadCallback()
      }
    }
  </script>
  <style type="text/css">
    html {
      font-family: sans-serif;
      -ms-text-size-adjust: 100%;
      -webkit-text-size-adjust: 100%;
    }

    body {
      margin: 0;
    }

    #body {
      font-size: 16px;
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    main,
    menu,
    nav,
    section,
    summary {
      display: block;
    }

    audio,
    canvas,
    progress,
    video {
      display: inline-block;
      vertical-align: baseline;
    }

    audio:not([controls]) {
      display: none;
      height: 0;
    }

    [hidden],
    template {
      display: none;
    }

    a {
      background-color: transparent;
    }

    a:active,
    a:hover {
      outline: 0;
    }

    abbr[title] {
      border-bottom: 1px dotted;
    }

    b,
    strong {
      font-weight: 700;
    }

    dfn {
      font-style: italic;
    }

    h1 {
      font-size: 2em;
      margin: 0.67em 0;
    }

    mark {
      background: #ff0;
      color: #000;
    }

    small {
      font-size: 80%;
    }

    sub,
    sup {
      font-size: 75%;
      line-height: 0;
      position: relative;
      vertical-align: baseline;
    }

    sup {
      top: -0.5em;
    }

    sub {
      bottom: -0.25em;
    }

    img {
      border: 0;
    }

    svg:not(:root) {
      overflow: hidden;
    }

    figure {
      margin: 1em 40px;
    }

    hr {
      box-sizing: content-box;
      height: 0;
    }

    pre {
      overflow: auto;
    }

    code,
    kbd,
    pre,
    samp {
      font-family: monospace, monospace;
      font-size: 1em;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      color: inherit;
      font: inherit;
      margin: 0;
    }

    button {
      overflow: visible;
    }

    button,
    select {
      text-transform: none;
    }

    button,
    html input[type='button'],
    input[type='reset'],
    input[type='submit'] {
      -webkit-appearance: button;
      cursor: pointer;
    }

    button[disabled],
    html input[disabled] {
      cursor: default;
    }

    button::-moz-focus-inner,
    input::-moz-focus-inner {
      border: 0;
      padding: 0;
    }

    input {
      line-height: normal;
    }

    input[type='checkbox'],
    input[type='radio'] {
      box-sizing: border-box;
      padding: 0;
    }

    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
      height: auto;
    }

    input[type='search'] {
      -webkit-appearance: textfield;
      box-sizing: content-box;
    }

    input[type='search']::-webkit-search-cancel-button,
    input[type='search']::-webkit-search-decoration {
      -webkit-appearance: none;
    }

    fieldset {
      border: 1px solid silver;
      margin: 0 2px;
      padding: 0.35em 0.625em 0.75em;
    }

    legend {
      border: 0;
      padding: 0;
    }

    textarea {
      overflow: auto;
    }

    optgroup {
      font-weight: 700;
    }

    table {
      border-collapse: collapse;
      border-spacing: 0;
    }

    td,
    th {
      padding: 0;
    }

    @media print {
      #wrapper {
        page-break-after: always;
      }

      table {
        page-break-after: auto;
      }

      .list tr {
        page-break-inside: avoid;
        page-break-after: auto;
        page-break-before: auto;
      }

      .list td {
        page-break-inside: avoid;
        page-break-after: auto;
        page-break-before: auto;
      }

      thead {
        display: table-header-group;
      }

      tfoot {
        display: table-footer-group;
      }

      footer {
        page-break-after: always;
      }

      .hide-in-print {
        display: none;
      }
    }

    .wrapper-wrapper {
      box-sizing: border-box;
      position: relative;
    }

    .scaled-content {
      box-sizing: border-box;
      display: inline-block;
      transform-origin: 0 0;
      z-index: -1;
    }
  </style>
</head>

<body id="body">
  <div id="content">
    <div style="width: 700px;margin: 0 auto;  color: #33394D; font-style: normal; font-family: 'IBM Plex Sans'; padding: 1.5rem 0 0.5rem 0;" id="wrapper"><div style="padding: 0 1.5rem;">
        <div style="font-weight: 400; font-size: 0.625rem; line-height: 1rem; margin-bottom: 0.5rem;">
            <div style="font-weight: 700; font-size: 1rem; line-height: 1.5rem;">Tax Invoice</div>
            <div>Invoice No: INV-{{$client_order->id}}</div>
            <div>Date: {{$client_order->create_datetime}}</div>
        </div>
        <?php $client_pickup_location =  DB::table("client_pickup_location")->where('client_id',$client_order->client_id)->where('pincode',$client_order->pickup_location)->first(); ?>
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr style="border-bottom: 1px #E0E3EB solid; vertical-align: top;">
                    <td style="padding-bottom: 1rem; width: 50%">
                        <div style="font-weight: 400; font-size: 0.625rem; line-height: 1rem;">
                            <div style="font-weight: 600; margin-bottom: 0.125rem;">BILL FROM</div>
                            <div style="font-weight: 600;">{{$client_pickup_location->facility_name}}</div>
                            <div>{{$client_pickup_location->pickup_address}}</div>
                            <div></div>
                            <div>{{$client_pickup_location->pincode}}, IN</div> 
                            <div>Email: {{$client_pickup_location->pickup_email}}</div> 
                        </div>
                    </td>
                    <td><img src="" style="max-height: 5rem; max-width: 5rem; border-radius: 0.5rem;"></td>
                </tr>
                <tr style="border-bottom: 1px #E0E3EB solid; vertical-align: top;">
                    <td style="padding: 1rem 0;">
                        <div style="font-weight: 400; font-size: 0.625rem; line-height: 1rem;">
                            <div style="font-weight: 600;">SHIPPING ADDRESS</div>
                            <div style="font-weight: 600;">{{$client_order->cust_fname}} {{$client_order->cust_lname}}</div>
                            <div>{{$client_order->cust_address1}}</div>
                            <div>{{$client_order->cust_address2}}</div>
                            <div>{{$client_order->cust_city}}, {{$client_order->cust_state}} - {{$client_order->cust_pincode}}</div>  
                        </div>
                    </td>
                    <?php if($client_order->cust_billing_type == '0') {?>
                    <td style="padding: 1rem 0;" colspan="2">
                        <div style="font-weight: 400; font-size: 0.625rem; line-height: 1rem;">
                            <div style="font-weight: 600;">SHIPPING ADDRESS</div>
                            <div style="font-weight: 600;">{{$client_order->cust_fname}} {{$client_order->cust_lname}}</div>
                            <div>{{$client_order->cust_address1}}</div>
                            <div>{{$client_order->cust_address2}}</div>
                            <div>{{$client_order->cust_city}}, {{$client_order->cust_state}} - {{$client_order->cust_pincode}}</div>  
                        </div>
                    </td>
                    <?php } else { ?>
                    <td style="padding: 1rem 0;" colspan="2">
                        <div style="font-weight: 400; font-size: 0.625rem; line-height: 1rem;">
                            <div style="font-weight: 600;">SHIPPING ADDRESS</div>
                            <div style="font-weight: 600;">{{$client_order->cust_fname}} {{$client_order->cust_lname}}</div>
                            <div>{{$client_order->cust_billing_address1}}</div>
                            <div>{{$client_order->cust_billing_address2}}</div>
                            <div>{{$client_order->cust_billing_city}}, {{$client_order->cust_billing_state}} - {{$client_order->cust_billing_pincode}}</div>  
                        </div>
                    </td>
                    <?php } ?>
                </tr>
                <tr style="vertical-align: top;">
                    <td style="padding: 1rem 0;">
                        <div style="font-weight: 600; font-size: 0.625rem; line-height: 1rem;">
                            <div>ORDER DETAILS</div>
                            <div>Sales Number: <span style="font-weight: 400;">{{$client_order->order_id}}</span></div>
                            <div>Sale Date: <span style="font-weight: 400;">{{$client_order->create_datetime}}</span></div>
                         </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <table style="font-weight: 400; font-size: 0.625rem; line-height: 1rem; border-collapse: collapse; width: 100%;">
        <thead style="font-weight: 600; background-color: #F9F9F9; padding: 0.5rem 1.5rem">
            <tr>
                <th style="padding: 0.5rem 0.5rem 0.5rem 1.5rem;" align="left">Item Description</th>
                <th style="padding: 0.5rem;padding-left: 0;" align="left">SKU Code</th>
                <th style="padding: 0.5rem;padding-left: 0;" align="left">Qty</th>
                <th style="padding: 0.5rem;padding-left: 0;" align="left">Rate</th>.
                <th style="padding: 0.5rem;padding-left: 0;" align="left">Disc</th>
                <th style="padding: 0.5rem 1.5rem 0.5rem 0.5rem;padding-left: 0;" align="left">Total</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $i=1;
            $client_order_product =  DB::table("client_order_product")->where('order_id',$client_order->order_id)->get()->toArray();
            ?>
            @if(!empty($client_order_product))
            @foreach($client_order_product as $client_order_product)

            <?php $client_product=  DB::table("client_product")->where('client_id',$client_order->client_id)->where('item_name',$client_order_product->item_name)->first(); ?>
            <tr style="vertical-align: top;">
                <td style="padding-left: 1.5rem;">{{$client_order_product->item_name}} </td>
                <td>{{$client_product->sku_code}}</td>
                <td>{{$client_order_product->quantity}}</td>
                <td>INR {{$client_order_product->price}}</td>
                <td>INR {{$client_order_product->discount}}</td>
                <td>INR {{$client_order_product->final_price}}</td>
            </tr>
            @endforeach
		@endif
            <tr>
                <td style="padding: 1rem 1.5rem 0 1.5rem;" colspan="8">
                    <div style="background-color:#E0E3EB; height: 1px"></div>
                </td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td style="font-weight: 600;padding-top:0.125rem;">Discount</td>
                <td style="vertical-align: top; padding-top:0.125rem">INR {{$client_order->totaldiscount}}</td>
            </tr>
        </tbody>
    </table>
    <table style="width:100%;font-size:0.625rem;">
        <tbody style="width:100%;">
            <tr style="vertical-align: top;">
                <td style="width:50%;padding-left: 1.5rem;">
                    <div style="font-weight: 600;">Payment Type</div>
                    <div style="padding-top: 0.25rem"> <?php if($client_order->payment_mode == '0') { echo 'Pre-paid';} else { echo 'COD';} ?> </div>
                </td> 
                <td style="width:50%">
                    <table>
                        <tbody>
                            <tr>
                                <td style="font-weight: 600;padding-top:0.125rem;">Total</td>
                                <td style="padding-left: 0.25rem;padding-top:0.125rem;">INR {{$client_order->totalamount}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
           </tr>
           <tr>
            <td colspan="">
                <img src="" style="max-height: 7.8rem; max-width: 7.8rem;"></td>
            </tr>
        </tbody>
    </table>
    <div style="text-align: center; font-weight: 600; font-size: 0.625rem; line-height: 1rem;">Powered by QuickWay</div>
</div>
</div>
  <script type="text/javascript">
    isLoaded = true
    onLoadCallback()

    let applyScaling = (scaledWrapper) => {
      let scaledContent =
        scaledWrapper.getElementsByClassName('scaled-content')[0]
      scaledContent.style.transform = 'scale(1, 1)'

      let { width: cw, height: ch } = scaledContent.getBoundingClientRect()
      let { width: ww, height: wh } = scaledWrapper.getBoundingClientRect()

      let scaleAmtX = Math.min(ww / cw, wh / ch)
      let scaleAmtY = scaleAmtX

      scaledContent.style.transform =
        'scale(' + scaleAmtX + ',' + scaleAmtY + ')'
    }

    function showInvoices(htmls, callback) {
      var html
      var ji = 0
      var contEl = document.querySelector('#content')
      contEl.innerHTML = htmls
      /*  for (var i in htmls) {
        if (ji > 0) {
          contEl.append('<div class="pagebreak"></div>');
        }
        html = htmls[i];
        var fakeDiv = $('<div>');
        var theInvoice = fakeDiv.append(html).find('#wrapper')[0].outerHTML;
        contEl.append(theInvoice);
        ji++;
      } */

      var preData = document.getElementById('pre-data')
      if (preData) {
        preData.parentNode.removeChild(preData)
      }

      if (typeof callback === 'function') {
        callback()
      }

      const els = document.querySelectorAll('[data-size]')
      if (els.length) {
        els.forEach((v) => {
          v.remove()
        })
      }

      var imgs = document.images,
        len = imgs.length,
        counter = 0

      if (len > 0) {
        ;[].forEach.call(imgs, function (img) {
          if (img.complete) {
          } else img.addEventListener('load', incrementCounter, false)

          img.onerror = () => {
            incrementCounter()
            if (img && img.classList && img.classList.contains('hide-on-error')) {
              img.style.display = 'none'
              const sib = img.nextSibling
              if (sib && sib.classList && sib.classList.contains('image-error-text')) {
                sib.style.display = 'inline'
              }
            }

          }
          img.onload = () => {
            incrementCounter()
            if (img && img.classList && img.classList.contains('hide-on-error')) {
              const sib = img.parentNode.querySelector('.image-error-text')
              console.log(sib, sib.classList)
              if (sib && sib.classList && sib.classList.contains('image-error-text')) {
                sib.style.display = 'none'
              }
            }
          }
        })

        function incrementCounter() {
          counter++
          console.log(counter, len)
          if (counter === len) {
            setTimeout(function () {
              console.log('All images loaded!')

              let scaledWrappers =
                document.getElementsByClassName('scaled-wrapper')
              if (scaledWrappers) {
                for (item of scaledWrappers) {
                  applyScaling(item)
                }
              }

              window.document.close()
              window.print()
            }, 800)
          }
        }
      } else {
        setTimeout(function () {
          window.document.close()
          window.print()
        }, 600)
      }
    }
  </script>
  <style type="text/css">
    body {
      font-family: arial, helvetica, sans-serif;
      font-size: 12px;
    }

    #content {
      margin: 0;
    }

    #pre-data {
      width: 100%;
      text-align: center;
      position: absolute;
      top: 50px;
      font-style: italic;
      font-size: 14px;
    }

    #pre-data img {
      position: relative;
      top: 11px;
      margin-right: 5px;
    }

    #content iframe {
      width: 100%;
      border: 0;
    }

    .pagebreak {
      page-break-before: always;
    }

    @media print {
      table {
        page-break-after: auto;
      }

      .list tr {
        page-break-inside: avoid;
        page-break-after: auto;
        page-break-before: auto;
      }

      .list td {
        page-break-inside: avoid;
        page-break-after: auto;
        page-break-before: auto;
      }

      thead {
        display: table-header-group;
      }

      tfoot {
        display: table-footer-group;
      }

      footer {
        page-break-after: always;
      }

      .hide-in-print {
        display: none;
      }
    }
  </style>


</body></html>