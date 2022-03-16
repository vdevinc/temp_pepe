<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>



	<div style="padding:0px 0px;">
		<div style="
		/*border: 1px solid black;*/
    padding: 22px 25px;line-height: 25px;text-align: justify;">
			CHEF Name: <b>{{$user->full_name}} </b><br>
            Date of sign up: <b>{{today()->format('d-m-Y')}}</b>
        <br>
        <h3 style="text-align: center;"><b>INDEPENDENT CONTRACTOR AGREEMENT</b></h3><br>
        <p>
        	This Independent Contractor Agreement ( "Agreement") is made and entered into this <span id="date">{{today()->format('d')}}</span> day of <span id="month">{{today()->format('M')}}</span>, {{today()->format('Y')}} (“Effective Date”) by and between Pepe Le Chef, LLC a Florida limited liability company whose email address is <a href="#!">support@pepelechef.com</a> (hereinafter called “PEPE LE CHEF") and <span id="Name">{{$user->full_name}}</span>, whose email address is <span id="mail">{{$user->email}}</span> (hereinafter called "CHEF").
        </p>
        <br>
        <p><b>WITNESSETH:</b></p>
        <p style="margin-left: 30px;"><u><b>WHEREAS</b></u> PEPE LE CHEF is a company engaged in the business of e-commerce to connect chefs to end users, as defined below who desire a gourmet meal prepared by CHEF at the customer’s home, yacht, place of business or other selected location; and</p>
        <p style="margin-left: 30px;">
        	<u><b>WHEREAS</b></u> , CHEF <span id="name">{{$user->full_name}}</span> has successfully completed the required coursework and graduated_<span id="graduate-a" >{{$user->chef->chef_type_id == 1 ? 'X': '_'}}</span>_[or] is a student in good standing _<span id="graduate-b" >{{$user->chef->chef_type_id == 2 ? 'X': '_'}}</span>_ [check one as applicable] from <span id="university">{{$user->chef->chef_type_id == 1 ? 'school': $user->chef->school }}</span>, a culinary institute; and
        </p>
        <p style="margin-left: 30px;">
        	<u><b>WHEREAS</b></u>, CHEF wishes to be considered as a service provider utilizing PEPE LE CHEF’s e-commerce platform on the internet and/or mobile application to cook meals for end users at a predetermined date, time and location. 
        </p>
        <p style="margin-left: 30px;">
        	<u><b>NOW, THEREFORE</b></u>, in consideration of ten $10.00), in hand paid, each to the other and the mutual promises, covenants and obligations herein contained, PEPE LE CHEF and CHEF agree as follows:
        </p>
        <ol style="margin-left: 45px;">
        	<li>
        		<p><u><b>Recitals</b></u>. The above recitals are true and correct and incorporated herein by reference. In addition, CHEF represents that all information provided to PEPE LE CHEF in their application and profile is true and correct and will be updated immediately if there is any change in the information provided.</p>
        	</li><br>
        	<li>
        		<u><b>Definitions:</b></u>
        		<ul style="margin-left: 50px;">
        			<li>
        				<u><b>PEPE LE CHEF</b></u>. Whenever used herein, the name “PEPE LE CHEF“ shall mean Pepe Le Chef, LLC a Florida limited liability company, its members, officers, employees, representatives, successors and assigns.
        			</li><br>
        			<li>
        				<u><b>CHEF</b></u>. If CHEF is an individual, whenever used herein, the name “CHEF” shall mean CHEF and his or her employees, agents and representatives. If CHEF is a legal entity (such as a corporation, limited liability company or other legal entity), whenever used herein, “CHEF” shall refer to CHEF, its members, shareholders, officers, directors, partners, agents, representatives and its employees.
        			</li><br>
        			<li>
        				<u><b>End User</b></u> An “End User” is a customer who opens an account on the PEPE LE CHEF Platform. 
        			</li><br>
        			<li>
        				<u><b>Meal Price </b></u> Whenever used herein, the Meal Price shall mean the aggregate cost billed to an End User’s account for an order placed by that End User for <u>a personal chef to prepare preselected meals at a predetermined price, time and location.</u>
        			</li><br>
        			<li>
        				<u><b>Pepe Le Chef Platform</b></u> Whenever used herein, the term Pepe Le Chef Platform shall mean the software application found and down loadable on <u>support@pepelechef.com for use by End Users to solicit orders for a personal chef to prepare preselected meals at a predetermined price, time and location.</u>
        			</li><br>
        			<li>
        				<u><b>Services</b></u> Whenever used herein, the term Services shall mean the labor, skills, equipment and food supplies necessary for the complete fulfillment of an order placed by an End User for CHEF to prepare preselected meals at a predetermined price, time and location.
        			</li><br>
        			<li>
        				<u><b>Term</b></u> The word “Term” shall mean the time period set forth in paragraph 3(a).
        			</li>
        		</ul>
        	</li><br>
        	<li>
        		<u><b>Relationship of The Parties</b></u>.  The parties intend to create by this Agreement the relationship of independent contractor and not that of an employer-employee, a joint venture or partnership.  In addition:
        	</li><br>
        	   <ul style="list-style-type: lower-alpha;margin-left: 50px;">
        	   	<li>
        	   		<u><b>CHEF Determines Means and Methods</b></u>. Except as expressly set forth in this Agreement, CHEF shall be solely responsible for determining the means and methods for performing the Services.  CHEF shall have all labor, equipment and food supplies readily available for the fulfillment of Services. Upon receipt of push notifications for orders by End Users for Services, CHEF may accept or decline the opportunity to provide the Services ordered. Upon CHEF’s acceptance of an order for Services, CHEF will be obligated to provide the Services accepted. If CHEF does not accept the push notification advising of the opportunity to provide Services, CHEF will have no obligation with respect thereto.
        	   	</li><br>
        	   	<li>
        	   		 <u><b>PEPE LE CHEF Has No Control Over CHEF</b></u>.  PEPE LE CHEF shall have no control or supervision over CHEF.  CHEF shall not represent that CHEF is an employee or affiliate of PEPE LE CHEF,and shall at all times represent CHEF as an independent contractor soliciting Services on the PEPE LE CHEF Platform.  CHEF shall not, under any circumstances, be deemed to be an employee or affiliate of PEPE LE CHEF for any purposes, including federal tax purposes. This Agreement shall not be interpreted as a joint venture or partnership between CHEF and PEPE LE CHEF.
        	   	</li><br>
        	   	<li>
        	   		<u><b>PEPE LE CHEF Will Not Withhold Taxes</b></u>.  PEPE LE CHEF shall not withhold any taxes from any payments made to CHEF pursuant to this agreement.  PEPE LE CHEF has not, is not, and shall not be obligated to make, and it is the sole responsibility of CHEF to make, all periodic filings and payments required to be made in connection with any requirement to withhold taxes, FICA taxes, federal unemployment taxes, and any other federal, state or local taxes, payments or filings required to be paid, made, or maintained in connection with any payments made to CHEF by PEPE LE CHEF.  PEPE LE CHEF has not, will not, and shall not be obligated to provide workers’ compensation insurance for CHEF.  PEPE LE CHEF has not, will not and shall not be obligated to provide any minimum compensation, vacation pay, sick leave or any other fringe benefit to CHEF.  PEPE LE CHEF shall provide CHEF with a Form 1099-MISC, Miscellaneous Income after the conclusion of each calendar year to report the sum total of all payments made to Chef in the preceding calendar year. CHEF agrees to indemnify and hold PEPE LE CHEF harmless from and against any taxes, late fees  or interest resulting from the assessment of any income taxes, withholding taxes, FICA taxes, social security taxes, and self-employment taxes,  unemployment taxes, and any other federal, state or local tax, payment or filing required to be paid, made or maintained in connection with any payments made to CHEF by PEPE LE CHEF.
        	   	</li><br>
        	   	<li>
        	   		<u><b>No Authority to Bind The Other Party</b></u>.  Except for the Services provided for in this agreement and authorized herein, neither party shall have the authority to bind the other by any promise, agreement or representation, oral or written, unless specifically authorized in a writing bearing an authorized signature of the parties to this agreement. CHEF is not authorized to enter into any agreement, whatsoever, for or on behalf of PEPE LE CHEF.  CHEF has no authority to amend, modify or alter any contract to which PEPE LE CHEF is a party and/or to prepare, sign, and/or authorize any addendum thereto without having first obtained the prior written consent of PEPE LE CHEF.
        	   	</li><br>
        	   	<li>
        	   		<u><b>No Employee Benefits</b></u>.  PEPE LE CHEF and CHEF hereby acknowledge and agree that neither CHEF nor any of CHEF’s Employees are employees of PEPE LE CHEF and are therefore not entitled to any of PEPE LE CHEF's employee benefits that may be maintained, offered or provided by PEPE LE CHEF to its employees from time to time.
        	   	</li><br>
        	  </ul>
        	 <li>
        	 	<u><b>Term.</b></u>   The term of this Agreement shall be for a period commencing on the Effective Date and continuing for a period of one (1) year (“Term”) unless sooner terminated in accordance with the provisions of this Agreement.
        	 </li><br> 
        	 <li>
        	 	<u><b>Engagement</b></u>.  PEPE LE CHEF hereby engages CHEF to perform the Services. During the Term of this agreement, CHEF shall devote her or his best efforts to providing Services to PEPE LE CHEF’s End Users and shall devote such time, attention, skill and energy to the performance of CHEF’s Services hereunder in a professional and workman-like manner consistent with the standard in the community for the services of a personal chef at the set time, date and location set forth on the push notifications accepted by CHEF for the performance of Services. CHEF accepts such engagement, upon the terms and conditions herein set forth, and agrees to serve PEPE LE CHEF, as follows:  
        	 </li><br>
        	 <ul style="margin-left: 50px;">
        	 	<li>
        	 		<u><b>Compensation</b></u>.  CHEF’s compensation shall be determined by the predetermined End User price (“Meal Price”) of the Meal(s) requested by the End User equal to 85% of the total Meal Price minus 2.9% of the Meal Price minus $1.30 and shall receive no other compensation. Each End User shall be obligated to pay sales tax on the Meal Price. PEPE LE CHEF will charge each End User the appropriate sales tax and remit the same to CHEF, together with CHEF’s compensation for its Services. PEPE LE CHEF will remit CHEF’s compensation and sales taxes collected within 3 business days after the receipt of the credit card remittance for CHEF’s Services. Since gratuities are given solely at the discretion of the End User, PEPE LE CHEF will not include or collect any gratuity. CHEF may accept gratuities collected in cash directly from the End User. Notwithstanding, CHEF may not condition the rendering of Services upon the payment of a gratuity but may inform End Users that gratuities are appreciated. 
        	 	</li><br>
        	 	<li>
        	 		<u><b>Services</b></u>.    PEPE LE CHEF will register End Users who can place orders for Services at a predetermined date, time and location. When orders are placed for Services, PEPE LE CHEF will send push notifications to its independent contractor chefs as they are received. If CHEF accepts the Services, they must provide said Services in a timely and professional manner. CHEF’s duties include, but are not limited to the following specific duties:

        	 	</li><br>
        	 	<li>
        	 		To respond to all inquiries, internal investigation and push notifications from PEPE LE CHEF within a reasonable time;
        	 	</li><br>
        	 	<li>
        	 		To create a predetermined menu of (ie;) appetizers, meals and desserts at prices selected by CHEF, approved by PEPE LE CHEF, available for End Users to select on PEPE LE CHEF’s Platform;
        	 	</li><br>
        	 	<li>
        	 		To refrain from offering any Services not previously approved by PEPE LE CHEF;
				</li><br>
				<li>
					To refrain from changing the price of any Services previously approved by PEPE LE CHEF or ordered by End Users;
				</li><br>
				<li>
					To accept or reject any End User request received by CHEF by push notification for Services at the End User’s requested venue on the requested date at the requested time;
				</li><br>
				<li>
					To use the highest quality food stock and supplies;
				</li><br>
				<li>
					To meet or exceed the professional culinary standards of the community for private chefs;
				</li><br>
				<li>
					To meet or exceed the food storage, transportation and preparation standards, rules and regulations of all city, state and municipal laws and the local health department for the preparation of meals;
				</li><br>
				<li>
					To abide by the Kitchen Rules and Regulations promulgated by PEPE LE CHEF, as may amended from time;
				</li><br>
				<li>
					To show up in a timely manner at the appointed time, well dressed and well groomed;
				</li><br>
				<li>
					To act in a courteous and business-like manner when providing Services to an End Users and to refrain from the use of any foul language at all times;
				</li><br>
				<li>
				To provide all pots, pans and cooking utensils necessary to create the preselected Services;	
				</li><br>
				<li>
					To promptly notify PEPE LE CHEF of any problems, disputes or complaints with End Users;
				</li><br>
				<li>
					To refrain from disparaging PEPE LE CHEF to any End User for any reason;
				</li><br>
				<li>
					To maintain and update, as necessary, accurate contact information, including but not limited to CHEF’s telephone number, mailing address and email address;
				</li><br>
				<li>
					To register with the Florida Department of Revenue as a provider of services, obtain a sales tax identification number and timely remit all sales taxes paid for the Services prepared by CHEF paid by the End Users remitted to CHEF by PEPE LE CHEF and to pay all sales and use taxes to the Florida Department of Revenue.
				</li><br>
				<li>
					<u><b>Other Expenses</b></u>.  All other expenses incurred by CHEF in connection with her or his performance of the Services shall be at CHEF’s sole cost and expense without exception. Without limiting the foregoing, the parties specifically agree that CHEF will not be entitled to reimbursement for mileage, cell phone, or any other expense incurred in performing Services not offered on the PEPE LE CHEF platform.
				</li><br>
        	 </ul>
         <li>
         	<u><b>Non-Solicitation</b></u>.  During the period that CHEF provides Services to PEPE LE CHEF, and for a period of two (2) years following the termination of CHEF’s independent contractor relationship with PEPE LE CHEF, regardless of the reason for such termination, CHEF shall not, directly or indirectly, individually or as an employee, agent, shareholder, member, partner, manager, officer, director or representative of any entity, enter into or attempt to enter into  any relationship of any kind with any PEPE LE CHEF End User. CHEF further agrees that during the Term of this Agreement and for a period of two (2) years of the effective date of termination of this Agreement, regardless of the reason for such termination, neither CHEF nor CHEF’s employees, agents or representatives will make any contact with, deal with or enter into any transactions for compensation, directly or indirectly, with any End User which has been introduced to CHEF by PEPE LE CHEF. 
         </li><br>	 
         <li>
         	<u><b>Confidential Information</b></u>.  CHEF recognizes and acknowledges that it may have access to certain information, trade secrets or both of PEPE LE CHEF including without limitation, End User contact information, customer lists, pricing and marketing strategies, all relating to or useful to and the exclusive property of PEPE LE CHEF, (collectively, the “Confidential Information”).  During the time that CHEF is performing the Services, and at all times thereafter, CHEF shall not in any manner, either directly or indirectly, (i) use any part of the Confidential Information except to perform the Services, or (ii) divulge, disclose, distribute, reproduce or communicate to any person or organization any of the Confidential Information without the prior written consent of PEPE LE CHEF; provided, however, that CHEF may disclose the Confidential Information (i) to third parties if such Confidential Information is or becomes publicly available without a breach of this Agreement by CHEF, or (ii) as may be required by law or court process, provided that CHEF gives PEPE LE CHEF reasonable prior notice to allow PEPE LE CHEF sufficient time to obtain a protective order to prevent disclosure of the Confidential Information or take other appropriate action.  CHEF acknowledges and agrees that all notes, records, reports, sketches, plans, menus of other chefs, unpublished memoranda or other documents, web design, business plan or trade secret belonging to PEPE LE CHEF, including matters concerning any information relating to PEPE LE CHEF’s business, are the property of PEPE LE CHEF and will never be used by CHEF, for any reason whatsoever. 
         </li><br>
         <li>
         	<u><b>Enforceability</b></u>.  CHEF acknowledges and agrees that the Confidential Information of PEPE LE CHEF is of a unique and special character that gives this information a special and proprietary value to PEPE LE CHEF. CHEF acknowledges that the restrictions on CHEF pursuant to Sections 4 and 5 are vital to the success of PEPE LE CHEF, and that damages at law would be an inadequate remedy for any breach or threatened breach of Sections 4 and/or 5 by CHEF.  Therefore, in the event of a breach, or threatened breach by CHEF of any provision of Sections 4 and/or 5, PEPE LE CHEF shall be entitled, in addition to all other rights or remedies available under the law, to an injunction restraining such breach.  CHEF agrees that the restrictions set forth in Sections 4 and 5 are reasonable in duration and scope.  If, in any legal proceedings, a court shall refuse to enforce the covenants, then the duration and scope of such unenforceable covenants shall be deemed to be reduced to the greatest duration and scope, which would be enforceable by such court.
         </li><br>
         <li>
         	<u><b>Indemnification</b></u>. CHEF shall indemnify and hold PEPE LE CHEF and PEPE LE CHEF’s employees, members, officers, directors, shareholders, representatives and/or affiliates (collectively, the “PEPE LE CHEF Group”) harmless from and against any and all liabilities, losses, damages, claims, demands, actions and rights of action, costs and expenses (including reasonable attorneys’ and paralegals’ fees and costs, whether suit is instituted or not, and if suit is instituted, at all levels) (collectively, “Claims”) suffered by any of the PEPE LE CHEF Group arising out of or in respect of (i) any violation of law by CHEF or CHEF’s employees, agents and representatives (ii) fraud, misrepresentation, willful misconduct, negligence or gross negligence on the part of CHEF or CHEF’s employees, agents and representatives unless such fraud or misrepresentation is the result of information provided by PEPE LE CHEF,  or (iii) a breach of this Agreement by CHEF or CHEF’s employees, agents and representatives. 
         </li><br>
         <li>
         	<u><b>Termination.</b></u> 
         </li><br>
         <ul style="list-style-type: lower-alpha;margin-left: 50px;">
         	<li>
         		Right To Terminate.  PEPE LE CHEF and CHEF shall each have the right to terminate CHEF’s this agreement, without cause, at any time during the Term of this Agreement. Any such termination may be effective immediately, or at a predetermined date, upon written notice by email to the other party of such party's election to exercise the right to terminate this Agreement in accordance with this Section.  
         	</li><br>
         	<li>
         		<u><b>Compensation Upon Termination</b></u>.   Upon either party’s termination of this agreement, CHEF shall be paid for all Services rendered prior to the date of termination. 
         	</li><br>
         	<li>
         		<u><b>Deletion of Confidential Information</b></u>. CHEF agrees that upon termination, CHEF shall delete any Confidential Information as defined in paragraph 5 above, in their possession, within forty-eight (48) hours of the effective date of termination and shall provide written confirmation of deletion upon conclusion of the 48 hours.
         	</li><br>
         	<li>
         		<u><b>Compliance with Laws</b></u>.  CHEF shall at all times comply will all applicable requirements imposed by applicable law, statute, and regulation, including, without limitation, all laws, rules and regulation of the health department and the Florida Department of Business and Professional Regulation applicable to the rendering of the Services to End Users.  
         	</li><br>
         	<li>
         		<u><b>Entire Agreement</b></u>.  This Agreement, and the exhibits attached hereto and incorporated herein, represent the entire understanding and agreement between the parties with respect to the subject matter hereof, and supersedes all other negotiations, understandings and representations (if any) made by and between such parties.
         	</li><br>
         	<li>
         		<u><b>Assignment</b></u>.  CHEF shall not assign its rights and/or obligations hereunder without the prior written consent of PEPE LE CHEF. In addition, CHEF agrees that it may not delegate the obligation to render Services before or after accepting an End User’s request for Services. PEPE LE CHEF shall have the right to assign the Agreement without the consent of CHEF.
         	</li><br>
         	<li>
         		<u><b>Severability</b></u>.  If any part of this agreement or any other agreement entered into pursuant hereto is contrary to, prohibited by or deemed invalid under applicable law or regulation, such provision shall be inapplicable and deemed omitted to the extent so contrary, prohibited or invalid, but the remainder hereof shall not be invalidated thereby and shall be given full force and effect so far as possible.
         	</li><br>
         	<li>
         		<u><b>Governing Law, Jurisdiction and Venue</b></u>.  The parties acknowledge that this Agreement shall be governed by the laws of the State of Florida, and venue for any action resulting from this Agreement shall occur in Miami-Dade County, Florida.  The prevailing party in any such action shall be entitled to recover reasonable attorney's fees, court costs and all expenses even if not taxable as court costs (including, without limitation, all such fees, costs and expenses incident to appeals, bankruptcy, arbitration, and post-judgment proceedings), incurred in that action or proceeding, in addition to any other relief to which such party or parties may be entitled.
         	</li><br>
         	<li>
         		<b>WAIVER OF TRIAL BY JURY</b>.  THE PARTIES HEREBY KNOWINGLY, VOLUNTARILY AND INTENTIONALLY WAIVE THE RIGHT EITHER MAY HAVE TO A TRIAL BY JURY IN RESPECT TO ANY LITIGATION BASED HEREON, OR ARISING OUT OF, UNDER OR IN CONNECTION WITH, THIS AGREEMENT AND ANY AGREEMENT CONTEMPLATED TO BE EXECUTED IN CONJUNCTION HEREWITH, OR ANY COURSE OF CONDUCT, COURSE OF DEALING, STATEMENTS (WHETHER VERBAL OR WRITTEN) OR ACTIONS OF EITHER PARTY.  THIS PROVISION IS A MATERIAL INDUCEMENT FOR THE PARTIES TO ENTER INTO THIS AGREEMENT. 
         	</li><br>
         </ul>
      </ol>
      <br>
      <p style="text-align: center;">IN WITNESS WHEREOF, the parties hereto have executed this agreement as of the date set forth above.</p>
      <br>
     <p style="padding-left: 70px;">
     	<b>PEPE LE CHEF, LLC</b><br>
     	<br>
     	By:<br>
     	_________________<br>
     	Print Name: G. K. Nshanyan
     	<br><br>
         <img  style=""src="images/pepesign.png" width="150">
     </p>
     <p style="margin-top: -166px;
    float: right;padding-right: 70px">
     	<b>CHEF</b><br>
     	<br>
     	By: <span id="name">{{$user->full_name}}</span><br>
     	____________________<br>
		 Print Name: {{$user->full_name}} 
		 
		 <br><br>
		 <img  style=""src="{{public_path($sig_file)}}" width="150">
     </p>

    

		</div>
    </div>	
    
    </body>
</html>
    
								

								
	
