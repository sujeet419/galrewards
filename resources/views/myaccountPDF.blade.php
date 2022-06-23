<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Account Summary</title>
  
	
	<style>
	
	@font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 18cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #0087C3;
  font-size: 1.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 5px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

/*table td {
  text-align: right;
}*/

table td h3{
  color: #4e5d53;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #4e5d53;
  width:50px;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #4e5d53;
  color: #FFFFFF;
  width:100px;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #57B223;
  font-size: 1.4em;
  border-top: 1px solid #57B223; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}
	
	
	
	
	</style>
	
	
	
	
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="http://103.159.183.18/galrewards/frontend/assets/images/logo.jpg">
      </div>
      <div id="company">
        <h2 class="name">Galrewards</h2>
        <div>Satguru Overseas</div>
        <div>(12) 519-0450</div>
        <div><a href="mailto:info@galrewards.com">info@galrewards.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Account TO:</div>
          <h2 class="name"></h2>
        
          <div class="email"><a href="mailto:{{$email}}">{{$email}}</a></div>
        </div>
        <div id="invoice">
          <h1>Account Summary</h1>
		  <div class="date"> Closing Balance: {{$closingbal}}</div>
          <div class="date"> From Date: {{$from_date}}</div>
          <div class="date">TO Date: {{$to_date}}</div>
        </div>
      </div>
	   <h3>Point details</h3>
	   <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="unit">Date</th>
           <th class="unit">Note</th>
            <th class="total">Points Earned</th>
          </tr>
        </thead>
        <tbody>
		
		 @php
  if(isset($pointsummary))
        $sno = 1;
    @endphp
                     
@foreach ($pointsummary as $item)

    <tr>
	  <td class="no">{{ $sno++ }}</td>
        <td class="qty">{{ date('d-m-Y', strtotime($item->created_at)) ?? '' }}</td> 
 <td class="qty">Monthly Point</td> 		
     <td class="total">{{ $item->points ?? '' }}</td>
  
     
    </tr>
    
    @endforeach

        
        </tbody>
   
      </table>
	  
	  	  <h3>Bonus Point details</h3>
	  <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="unit">Date</th>
           <th class="unit">Note</th>
            <th class="total">Bonus Earned</th>
          </tr>
        </thead>
        <tbody>
		
		@php
  if(isset($bonuspointssummary))
        $sno = 1;
    @endphp
                     
@foreach ($bonuspointssummary as $item)

    <tr>

      <td class="no">{{ $sno++ }}</td>
      <td class="qty">{{ date('d-m-Y', strtotime($item->created_at)) ?? '' }}</td>
      <td class="qty">{{ $item->bonus_reason ?? '' }}</td>
      <td class="total">{{ $item->bonus_point ?? '' }}</td>
    
   
    </tr>
    
  
    @endforeach
		
       
        </tbody>
   
      </table>
	  
	  <h3>Reddem Point details</h3>
	  
	  
	    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="unit">Date</th>
          <th class="unit">Note</th
            <th class="total">Reddem Point</th>
          </tr>
        </thead>
        <tbody>
		
		 @php
  if(isset($pointusedsummary))
        $sno = 1;
    @endphp
                     
@foreach ($pointusedsummary as $item)

    <tr>
      <td class="no">{{ $sno++ }}</td>
      <td class="qty">{{ date('d-m-Y', strtotime($item->created_at)) ?? '' }}</td>
   <td class="qty">Item Order</td>
     <td class="total">{{ $item->points ?? '' }}</td>
    
   
    </tr>
    
  
    @endforeach
		
	        
        </tbody>
   
      </table>
	  
	  
	 
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Account summary was created on a computer and is valid without the signature and seal.</div>
      </div>
    </main>
    <footer>
      Account summary was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>