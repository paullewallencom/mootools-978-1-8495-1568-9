<!--- 2011-02-09 jjohnston retrieve external data for ajax --->
<cfparam name=request.error default=''>
<cfif request.error neq 1>
  Thank you we received your submission:<br/>
  <cfdump var=#form#>
<cfelse>
  Error!  Something is wrong with the data in your form.  Please check it and try again.
</cfif>
