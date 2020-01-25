<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        /*[type="text"] {
            height: 10px;
            display: inline-block;
            border: 0;
            border-bottom: 0.5px solid #000;
            background: #f1f4ff;
            margin: 0;
            font-size: 10px;
            line-height: normal;
        }
        
        
        
        
        
        tr,
        p {
            margin: 0;
        }*/
		[type*="checkbox"] {
            margin: 0;
            width: 18px;
            height: 8px;
            vertical-align: text-top;
            cursor: pointer;
        }
        .p,
        .a {
            font-size: 8.5px;
            color: #000;
            text-decoration: none;
            margin: 0;
        }
        
        b {
            font-weight: 600;
        }
        table table {
            border-collapse: collapse;
        }
		span{margin-top:10px;}
    </style>
</head>
<body>
    <div style="
    border-bottom: 1px solid #000;
    display: inline-block;
    width: 100%;
">
    {{--    <div style="border-bottom: 5px solid red;padding-bottom: 0px;display: inline-block; width: 70px;">Address :</div>--}}
    {{--    <span>Nidhi</span>--}}

</div>
    <table collapse="1" style="border-spacing:0px;" width="700px" height="900px">
        <tr>
            <td>
                <h1 style="margin: 0 0 10px 0;font-size: 16px; width: 100%;">VISA Prepaid Card Application Form</h1>
                <th style="margin: 0; font-size: 40px; padding: 2px 3px; font-weight: 600;color: #fecc00; text-align: right;">
                    FINEXUS
                </th>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; margin-left:10px;" width="50%">
                <table>
                    <tr style="background-color: #fecc00;">
                        <th style="margin: 0; font-size: 12px; padding: 2px 3px; font-weight: 600;">16 Digits Reference Number
                        </th>
                    </tr>
                    <tr>
                        <td style="border-bottom:1px solid #000; font-size:20px; background-color:#edf8ff; padding:50px;">
                            {{$data['card_no']}}
                        </td>
                    </tr>
                    <tr style="background-color: #fecc00;">
                        <th style="margin: 0; font-size: 12px; padding: 2px 3px; font-weight: 600;">Eligibility & Documents Required
                        </th>
                    </tr>
                    <tr>
                        <td class="p"><b>Eligibility :</b>Minimum age 18 years</td>
                    </tr>
                    <tr>
                        <td class="p"><b>Documentation :</b>Copy of NRIC (both sides) / Passport / Other Identification</td>
                    </tr>
                    <tr>
                        <td class="p"><b>Kindly send completed application form to: </b></td>
                    </tr>
                    <tr>
                        <td class="p">• Fax : +603 8318 0761 or • Email : app@finexuscards.com</td>
                    </tr>
                    <tr>
                        <td class="p">All information must be provided without alteration to avoid delay in processing of card application.
                        </td>
                    </tr>
                    <tr style="background-color: #fecc00;">
                        <th style="margin: 0; font-size: 12px; padding: 2px 3px; font-weight: 600;">Personal Details</th>
                    </tr>
                    <tr>
                        <td class="p"><b>(*) Denotes compulsory fields</b></td>
                    </tr>
                    <tr class="p">
                        <td class="p"><b>*Title :</b>
                            <input type="checkbox" {{$data['title']=='Mr' ? 'checked="checked"': ''}}> Mr
                            <input type="checkbox" {{$data['title']=='Ms' ? 'checked="checked"': ''}}> Ms
                            <input type="checkbox" {{$data['title']=='Mrs' ? 'checked="checked"': ''}}>Mrs
                            <span style="border-bottom:1px solid #000;width: 250px; background-color:#f4f4f4; padding:5px;"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="p">

                            <p style="border-bottom: 1px solid #000000;width: 100%;display: inline-block;">

                                <b style="border-bottom: 2px solid #ffffff !important;">*Name as in NRIC / Passport : </b>
								{{$data['name']}}
                            </p>
                        </td>

                    </tr>

                    <tr>
                        <td class="">
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p"><b>*NRIC No. (New) :</b></td>
                                    <td style="border-bottom:1px solid #000;padding:5px; background-color: #edf8ff; width: 260px;">
                                        {{$data['nric_no']}}

                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td class="p">Police or Army Identification No. :</td>
                    </tr>
                    <tr>
                        <td style="padding:5px; background-color: #edf8ff; width: 100%;">
                            <span style="display:inline-block;border-bottom:1px solid #000;width: 100%;"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="p">
                            <table collapse="1" style="border-spacing:0;">
                                <tr>
                                    <td width="50%;" class="p">
                                        <table>
                                            <tr>
                                                <td class="p">Passport No. (if *non-Malaysian):</td>
                                            </tr>
                                            <tr>
                                                <td class="p" style="border-bottom:1px solid #000;padding:5px; background-color: #edf8ff; width: 100%;">
                                                    <span>{{$data['passport_no']}}</span></td>
                                            </tr>
                                        </table>

                                    </td>
                                    <td width="50%;" style="padding-left: 50px;" class="p">
                                        <table>
                                            <tr>
                                                <td class="p"> *Date of Birth (dd/mm/yyyy):</td>
                                            </tr>
                                            <tr>
                                                <td class="p" style="border-bottom:1px solid #000;padding:5px; background-color: #edf8ff; width: 100%;">
                                                    <span>{{\Carbon\Carbon::parse($data['dob'])->format('m-d-Y')}}</span>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="p">
                        <td class="p"><b>*Sex :</b>
                            <input type="checkbox" style="margin-left: 10px;" {{$data[ 'sex']=='male' ? 'checked="checked"': ''}}>Male
                            <input type="checkbox" style="margin-left: 10px;" {{$data[ 'sex']=='female' ? 'checked="checked"': ''}}>Female
                        </td>
                    </tr>
                    <tr>
                        <td class="p">
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p"><b>*Nationality :</b></td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 280px;">
                                        <span>{{$data['nationality']}}</span>

                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p"><b>*Email :</b></td>
                                    <td class="p" style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 300px;">

                                        <span>{{$data['email']}}</span>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td class="p">
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p"><b>*Residential Address: </b></td>
                                    <td class="p" style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 250px;">

                                        <span>{{$data['residential_address']}}</span>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td class="p">
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p"><b>*Postcode:</b></td>
                                    <td class="p" style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 290px;">
                                        <span>{{$data['postal_code']}}</span>

                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td class="p" style="width: 350px;">
                            <table collapse="1" style="border-spacing:0;">
                                <tr>
                                    <td class="p">

                                        <table>
                                            <tr>
                                                <td class="p"><b>*State :</b></td>
                                            </tr>
                                            <tr>
                                                <td class="p" style="border-bottom:1px solid #000;padding:5px; background-color: #edf8ff; width: 140px;"><span>
                                {{$data['state']}}</span></td>
                                            </tr>
                                        </table>

                                    </td>
                                    <td style="padding-left: 50px;" class="p">
                                        <table>
                                            <tr>
                                                <td class="p"><b>*Country :</b></td>
                                            </tr>
                                            <tr>
                                                <td class="p" style="border-bottom:1px solid #000;padding:5px; background-color: #edf8ff; width: 140px;">
                                                    <span>{{$data['country']}}</span></td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>

                        </td>

                    </tr>
                    <tr>
                        <td>
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p"><b>*Mailing Address : </b></td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 250px;">
                                        {{$data['mailing_address']}}

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p"><b>*Postcode:</b></td>
                                    <td class="p" style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 290px;">
                                        <span>{{$data['mailing_postalcode']}}</span>

                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                    <tr>
                        <td class="" style="width: 350px;">
                            <table collapse="0" border="0">
                                <tr>
                                    <td class="">

                                        <table>
                                            <tr>
                                                <td class="p"><b>*State :</b></td>
                                            </tr>
                                            <tr>
                                                <td class="p" style="border-bottom:1px solid #000;padding:5px; background-color: #edf8ff; width: 140px;"><span>
                                {{$data['mailing_state']}}</span></td>
                                            </tr>
                                        </table>

                                    </td>
                                    <td style="padding-left: 50px;" class="p">
                                        <table>
                                            <tr>
                                                <td class="p"><b>*Country :</b></td>
                                            </tr>
                                            <tr>
                                                <td class="p" style="border-bottom:1px solid #000;padding:5px; background-color: #edf8ff; width: 140px;">
                                                    <span>{{$data['mailing_country']}}</span></td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>

                        </td>

                    </tr>
                    <tr>

                        <td class="p">
                            <table border="0" collapse="0">
                                <tr>
                                    <td class="p"> Home Tel No. :</td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 270px;">

                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p"><b>*Mobile No. :</b></td>
                                    <td class="p" style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 50px; margin-right: 10px">{{$data['c_code']}}</td>
                                    <td style="width: 15px">.</td>
                                    <td class="p" style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 210px;">
                                        {{$data['mobile_no']}}

                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                    <tr>
                        <td class="p">
                            <b style="margin-bottom: 5px; display: block;">*Mother’s Maiden Name (security feature for
            verification) :</b>
                            <table border="0" style="border-top:2px solid #fff;" collapse="1">
                                <tr>

                                    <td class="p" style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 330px">
                                        {{$data['security_ans']}}

                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>

                    <tr style="background-color: #fecc00;">
                        <th style="margin: 0; font-size: 12px; padding: 2px 3px; font-weight: 600;">Employment or Business Details
                        </th>
                    </tr>
                    <tr class="p">
                        <td class="p">Type of Occupation :
                            <input type="checkbox" style="margin-left: 20px;">Male
                            <input type="checkbox" style="margin-left: 20px;">Female
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p">Position :</td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 300px;">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p">Name of Company :</td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 260px;">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p">Office Address :</td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 260px;">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p">*Postcode :</td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 260px;">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="" style="width: 350px;">
                            <table collapse="0" border="0">
                                <tr>
                                    <td class="">

                                        <table>
                                            <tr>
                                                <td class="p"><b>*State :</b></td>
                                            </tr>
                                            <tr>
                                                <td class="p" style="border-bottom:1px solid #000;padding:5px; background-color: #edf8ff; width: 140px;"><span>
                                </span></td>
                                            </tr>
                                        </table>

                                    </td>
                                    <td style="padding-left: 50px;" class="p">
                                        <table>
                                            <tr>
                                                <td class="p"><b>*Country :</b></td>
                                            </tr>
                                            <tr>
                                                <td class="p" style="border-bottom:1px solid #000;padding:5px; background-color: #edf8ff; width: 140px;">
                                                    <span></span></td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>

                        </td>

                    </tr>

                    <tr>
                        <td class="p">

                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p">Office Tel No. :</td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width:50px;"></td>
                                    <td>-</td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff;width:80px;"></td>
                                    <td class="p">Ext</td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width:130px;"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p">Nature of Business :</td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 260px;">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="background-color: #fecc00;">
                        <th style="margin: 0; font-size: 12px; padding: 2px 3px; font-weight: 600;">*Politically Exposed Person Declaration (e.g. Ministerial / Diplomatic Positions)
                        </th>
                    </tr>
                    <tr>
                        <td class="p">
                            <input type="checkbox" checked="checked">No, I am / was not a PEP or associated with a PEP
                        </td>
                    </tr>
                    <tr>
                        <td class="p">
                            <input type="checkbox">Yes, I / my immediate family
                            <input type="checkbox">Currently hold / seeking
                            <input type="checkbox">Have held
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p"> Organisation: </td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 110px;">

                                    </td>
                                    <td class="p"> Relationship: </td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 110px;">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p"> Position held : </td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 110px;">

                                    </td>
                                    <td class="p"> Period from : </td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 50px;">

                                    </td>
                                    <td class="p"> - </td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 50px;">

                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                    <tr>
                        <td class="p" style="font-size: 7px;">Politically Exposed Persons (PEPs) refer to (i) individuals who are or who have been entrusted with prominent public functions by a foreign country (Foreign PEP) or domestically (Domestic PEP); (ii) persons who are or have been entrusted with a prominent function by an international organisation which refers to members of senior management. The definition of PEPs is not intended to cover middle ranking or more junior individuals with prominent public functions by a foreign country / domestically; or prominent functions by an international organisation.
                        </td>
                    </tr>
					
                </table>
            </td>
            <td style="border: 1px solid #000000;margin-left: 10px;" width="50%">
                <table>
                    <tr style="background-color: #fecc00;">
                        <th style="margin: 0; font-size: 12px; padding: 2px 3px; font-weight: 600;">Notices</th>
                    </tr>
                    <tr>
                        <td class="p">FINEXUS Cards Sdn Bhd (FINEXUS Cards) hereby notifies that it is necessary for FINEXUS Cards to collect and process your personal information and details which have been furnished by you for the purposes of and in connection with your application including but not limited to recording, storing, organizing, adaptation, alteration, correction, erasure, retrieval, use of your personal data whether financial or otherwise, and information relating to your account to such extent and in such manner as FINEXUS Cards may at its sole discretion deems fit, and; to disclose, divulge, disseminate or transmit your personal data to VISA Inc. and/or its officers, Bank Negara Malaysia (BNM) and/or such other authority or body established by BNM, FINEXUS Cards' related corporations, associates, affiliates, service providers, and/or any other parties as FINEXUS Cards deems necessary.
                        </td>
                    </tr>
                    <tr>
                        <td class="p">You may also request for access to and/or to update and amend your personal information and such request or other inquiries shall be made in writing to FINEXUS Cards or via our Call Centre at +603 8318 3100.
                        </td>
                    </tr>
                    <tr>
                        <td class="p">Please be informed that FINEXUS Cards may not be able to process your application if your personal information and consent is not obtained.
                        </td>
                    </tr>
                    <tr style="background-color: #fecc00;">
                        <th style="margin: 0; font-size: 12px; padding: 2px 3px; font-weight: 600;">Declaration</th>
                    </tr>
                    <tr>
                        <td class="p">I hereby irrevocably and unconditionally agree and authorise FINEXUS Cards Sdn Bhd (706720-U) to disclose my personal information including but not limited to recording, storing, organizing, adaptation, alteration, correction, erasure, retrieval, use of my personal data; and to disclose, divulge, disseminate or transmit my personal data, whether financial or otherwise and information relating to my account to such extent and in such manner as FINEXUS Cards may at its sole discretion deems fit to VISA Inc. and/or its officers, BNM and/or such other authority or body established by BNM, FINEXUS Cards' related corporations, associates, affiliates, service providers, and/or any other parties as FINEXUS Cards deems necessary.
                        </td>
                    </tr>
                    <tr>
                        <td class="p">I hereby acknowledge that the VISA Prepaid Card (hereinafter referred to as “the Card”) shall be governed by the terms and conditions contained in the FINEXUS Cards' VISA Prepaid Card Agreement including relevant addendums and any amendments made by FINEXUS Cards from time to time and agree to be bound by them upon the issuance of the Card.
                        </td>
                    </tr>
                    <tr>
                        <td class="p">I agree that FINEXUS Cards' application form herein shall be conclusive evidence of proof of my application for the Card and this clause shall survive the termination, cancellation or revocation of the Card by FINEXUS Cards.
                        </td>
                    </tr>
					
					<tr>
                        <td class="p">I understand that FINEXUS Cards may be obliged under the Anti-Money Laundering and Anti-Terrorism Financing Act 2001 and/or other laws and regulations to report certain transactions to BNM and/or other relevant authorities and I hereby consent to the same and agree that FINEXUS Cards, its officers and employees shall be under no liability for making such reports.
                        </td>
                    </tr>
                    <tr>
                        <td class="p">I hereby declare that all information given above is true and complete. I understand that FINEXUS Cards reserves the right to decline any application without giving any reason.
                        </td>
                    </tr>
                    <tr>
                        <td class="p">I unconditionally and irrevocably agree that I shall not dispute the contents of the faxed copy application form received by FINEXUS Cards which shall be deemed as original application and I shall produce the original to FINEXUS Cards upon request.
                        </td>
                    </tr>
                    <tr>
                        <td class="p">I hereby irrevocably and unconditionally agree and authorise FINEXUS Cards to verify any information including but not limited to my personal information and my credit standing without further approval from me from whatever sources, including the Inland Revenue Authorities, and by whatever means FINEXUS Cards considers appropriate; and to disclose or divulge any information (including personal data) relating to or arising from my application hereunder, and also information to my affairs and other facilities and/or accounts as FINEXUS Cards may at its sole discretion deems fit or necessary for any purpose whatsoever to VISA Inc. and/or its officers, BNM and/or such ther authority or body established by BNM, FINEXUS Cards' related corporations, associates, affiliates, service providers and/or any other parties as FINEXUS Cards deems necessary.
                        </td>
                    </tr>
                    <tr>
                        <td class="p">*Please tick (√) below to indicate your interest.</td>
                    </tr>
                    <tr>
                        <td class="p">I would like to opt-in for below transactions. The associated risk with my opt-in choices are made known and understood by me.
                        </td>
                    </tr>
                    <tr>
                        <td class="p">
                            <input type="checkbox" checked="checked">Online e-Commerce
                            <input type="checkbox" checked="checked">Overseas ATM Cash Withdrawal
                            <input type="checkbox" checked="checked">Overseas Purchases
                        </td>
                    </tr>
                    <tr>
                        <td class="p">
                            <input type="checkbox">Yes, I wish to receive the latest updates on marketing programmes and promotions conducted by FINEXUS Cards, its related corporations, associates, affiliates, service providers or partners. I agree and consent to the sharing of my mailing and contact information (excluding financial/account details) by FINEXUS Cards with appointed third party.
                        </td>
                    </tr>
					
					<tr>
                        <td class="p">
                            <input type="checkbox" checked="checked">No, I do not wish to receive any updates on marketing programmes and promotions conducted by FINEXUS Cards, its related corporations, associates, affiliates, service providers or partners. I do not agree to the sharing of my mailing and contact information (including financial/ account details) by FINEXUS Cards with appointed third party.
                        </td>
                    </tr>
                    <tr>
                        <td class="p"><b>Note:</b> You may wish at any time to provide or withdraw consent for disclosure of your information by calling FINEXUS Cards' Call Centre at +603 8318 3100
                        </td>
                    </tr>
                    <tr>
                        <td class="p"><b>By signing below, I confirm that I have read, understood, and agree to abide all
                    the declarations as stated in this application form including the terms and conditions of
                    the prepaid card stipulated in the Product Disclosure Sheet which is made available at
                www.finexuscards.com</b></td>
                    </tr>
                    <tr>
                        <td>
                            <div style="height: 60px; width: 100%; border: 1px solid #000;">
                                <img src="{{$data['img_sign']}}" style="display: block; height: 60px; width: 350px; ">
                            </div>
                        </td>
                    </tr>
					
					<!-- start test -->
					<tr>
                        <td>
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p">Date : </td>
                                    <td class="p" style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 280px;">
                                        {{\Carbon\Carbon::now()->format('m-d-Y')}}
                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>
					<tr style="background-color: #fecc00;">
                        <th style="margin: 0; font-size: 12px; padding: 2px 3px; font-weight: 600;">For Office use only</th>
                    </tr>
                    <tr>

                        <td>
                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p">Source Code:</td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width:100px;"></td>
                                    <td class="p"> Branch Code :</td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff;width:100px;"></td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>

                            <table border="0" collapse="1">
                                <tr>
                                    <td class="p">Officer Code : </td>
                                    <td style="border-bottom:1px solid #000;padding:4px; background-color: #edf8ff; width: 280px;">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
					
                </table>
            </td>
        </tr>
    </table>
</body>
</html>