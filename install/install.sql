SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Salvarea datelor din tabel `config`
--

INSERT INTO `config` (`id`, `name`, `value`) VALUES
(1, 'site_title', 'Majestic document generator'),
(18, 'enable_html', '1'),
(17, 'enable_docx', '1'),
(16, 'enable_pdf', '1'),
(19, 'user_documents', ''),
(20, 'email_from_email', 'office@wowscripts.net'),
(21, 'email_from_name', 'Adrian Petcu');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `content` text NOT NULL,
  `user` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `template` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Salvarea datelor din tabel `documents`
--

INSERT INTO `documents` (`id`, `title`, `content`, `user`, `created`, `template`) VALUES
(6, 'Initial Contract', '<p style="text-align: center;"><strong>INDEPENDENT CONTRACTOR AGREEMENT</strong></p>\r\n<p>This independent contractor agreement (the &ldquo;<strong>Agreement</strong>&rdquo;) is made and entered into as of 21.12.2013 (the &ldquo;<strong>Effective Date</strong>&rdquo;) between&nbsp;Your Company(the &ldquo;<strong>Company</strong>&rdquo;), a US Limited Company, and Other Contractor Name, a LIMITED COMPANY (the &ldquo;<strong>Contractor</strong>&rdquo;) (collectively, the &ldquo;<strong>Parties</strong>&rdquo;).</p>\r\n<p>The Company requests the Contractor to perform services for it and may request the Contractor to perform other services in the future; and</p>\r\n<p>The Parties therefore agree as follows:</p>\r\n<p>1.0.<strong>Term and Termination</strong>.</p>\r\n<p>1.1. This Agreement takes effect immediately as of the Effective Date, and remains in full force and effect until the Contractor has completed the Services (the "<strong>Term</strong>"), unless earlier terminated under this Section 1.</p>\r\n<p>1.2. Either Party may terminate this Agreement for cause by providing the other Party written notice if the other Party: (i) is in material breach of this Agreement and has failed to cure such breach within five (5) days after its receipt of written notice of such breach provided by the non-breaching Party; (ii) engages in any unlawful business practice related to that Party''s performance under the Agreement; or (iii) files a petition for bankruptcy, becomes insolvent, acknowledges its insolvency in any manner, ceases to do business, makes an assignment for the benefit of its creditors, or has a receiver, trustee or similar party appointed for its property.</p>\r\n<p>2.0.<strong>Contractor Services.</strong></p>\r\n<p>2.1. During the Term, the Company may engage the Contractor to provide the following services as needed (the "<strong>Services</strong>"), or other such services as mutually agreed upon in writing by the Parties (email is acceptable):</p>\r\n<p>2.2. The Contractor shall provide the necessary equipment to perform the Services. If the Contractor has obtained employees or agents (the "<strong>Contractor Personnel</strong>"), the Contractor shall be solely responsible for all costs associated with the Contractor Personnel.</p>\r\n<p>2.3 As a result of providing the Services, the Contractor or Contractor Personnel may create certain work product (the "<strong>Work Product</strong>").</p>\r\n<p>2.4. The Contractor shall notify the Company of any change(s) to the Contractor&rsquo;s schedule that could adversely affect the availability of the Contractor, whether known or unknown at the time of this Agreement, no later than [_____] prior to such change(s). If the Contractor becomes aware of such change(s) within the [____] period, the Contractor shall promptly notify the Company of such change(s) within a reasonable amount of time.</p>\r\n<p>2.5. The work performed by the Contractor shall be performed at the following rate: [$21 / hour]. The Contractor shall issue invoices to the Company''s accounts payable department within [15] days of completing the Services, unless otherwise instructed by the Company, and provide documentation as instructed by the Company''s accounts payable department. The Company shall remit payment to the Contractor within [15] days of receiving the invoice from the Contractor.</p>\r\n<p>2.6. The Company shall not be responsible for federal, state and local taxes derived from the Contractor''s net income or for the withholding and/or payment of any federal, state and local income and other payroll taxes, workers'' compensation, disability benefits or other legal requirements applicable to the Contractor.</p>\r\n<p>3.0.<strong>Independent Contractor Status.</strong></p>\r\n<p>3.1. The Parties intend that the Contractor and any Contractor Personnel be engaged as independent contractors of Company. Nothing contained in this Agreement will be construed to create the relationship of employer and employee, principal and agent, partnership or joint venture, or any other fiduciary relationship.</p>\r\n<p>3.2. The Contractor may not act as agent for, or on behalf of, the Company, or to represent the Company, or bind the Company in any manner.</p>\r\n<p>3.3. The Contractor will not be entitled to worker''s compensation, retirement, insurance or other benefits afforded to employees of the Company.</p>\r\n<p>4.0.<strong>Ownership</strong>.</p>\r\n<p>4.1. The Parties intend that, to the extent the Work Product or a portion of the Work Product qualifies as a "work made for hire," within the definition of Section 101 of the Copyright Act of the United States (17 U.S.C. &sect; 101), it will be so deemed a work made for hire. If the Work Product or any portion of the Work Product does not qualify as work made for hire, and/or as otherwise necessary to ensure the Company''s complete ownership of all rights, titles and interest in the Work Product, the Contractor shall transfer and assign to the Company all rights, titles and interests throughout the world in and to any and all Work Product. This transfer and assignment includes, but is not limited to, the right to publish, distribute, make derivative works of, edit, alter or otherwise use the Work Product in any way the Company sees fit.</p>\r\n<p>4.2. The Company grants the Contractor, a limited, non-exclusive, non-transferable, non-assignable, royalty free, worldwide license to display the Work Product on a platform personally controlled, in whole or in part, by the Contractor. The Company may revoke this license at any time by requesting the removal of the Work Product displayed by the Contractor. Upon such request, the Contractor shall remove the Work Product from the platform, and provide written notification of such removal.</p>\r\n<p>5.0. <strong>Representations.</strong> Both Parties represent that they are fully authorized and empowered to enter into this Agreement, and that the performance of the obligations under this Agreement will not violate or infringe upon the rights of any third-party, or violate any agreement between the Parties and any other person, firm or organization or any law or governmental regulation.</p>\r\n<p>6.0. <strong>Indemnification. </strong>The Contractor shall indemnify and hold harmless the Company, its affiliates, and its respective officers, directors, agents and employees from any and all claims, demands, losses, causes of action, damage, lawsuits, judgments, including attorneys&rsquo; fees and costs, arising out of, or relating to, the Contractor&rsquo;s services under this Agreement.</p>\r\n<p>7.0.<strong>Confidential Information.</strong></p>\r\n<p>7.1 Each Party (on its behalf and on behalf of its subcontractors, employees or representatives, or agents of any kind) agrees to hold and treat all confidential information of the other Party, including, but not limited to, trade secrets, sales figures, employee and customer information and any other information that the receiving Party reasonably should know is confidential (&ldquo;<strong>Confidential Information</strong>&rdquo;) as confidential and protect the Confidential Information with the same degree of care as each Party uses to protect its own Confidential Information of like nature.</p>\r\n<p>7.2 Confidential Information does not include any information that (i) at the time of the disclosure or thereafter is lawfully obtained from publically available sources generally known by the public (other than as a result of a disclosure by the receiving Party or its representatives); (ii) is available to the receiving Party on a non-confidential basis from a source that is not and was not bound by a confidentiality agreement with respect to the Confidential Information; or (iii) has been independently acquired or developed by the receiving Party without violating its obligations under this Agreement or under any federal or state law.</p>\r\n<p>8.0. <strong>Liability. </strong>EXCEPT WITH RESPECT TO THE PARTIES&rsquo; INDEMNIFICATION OBLIGATIONS, NEITHER PARTY SHALL BE LIABLE TO THE OTHER FOR ANY SPECIAL, INDIRECT, INCIDENTAL, PUNITIVE, OR CONSEQUENTIAL DAMAGES ARISING FROM OR RELATED TO THIS AGREEMENT, INCLUDING BODILY INJURY, DEATH, LOSS OF REVENUE, OR PROFITS OR OTHER BENEFITS, AND CLAIMS BY ANY THIRD PARTY, EVEN IF THE PARTIES HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. THE FOREGOING LIMITATION APPLIES TO ALL CAUSES OF ACTION IN THE AGGREGATE, INCLUDING WITHOOUT LIMITATION TO BREACH OF CONTRACT, BREACH OF WARRANTY, NEGLIGENCE, STRICT LIABILITY, AND OTHER TORTS.</p>\r\n<p>9.0. <strong>Disclaimer of Warranty. </strong>THE WARRANTIES CONTAINED HEREIN ARE THE ONLY WARRANTIES MADE BY THE PARTIES HEREUNDER. EACH PARTY MAKES NO OTHER WARRANTY, WHETHER EXPRESS OR IMPLIED, AND EXPRESSLY EXCLUDES AND DISCLAIMS ALL OTHER WARRANTIES AND REPRESENTATIONS OF ANY KIND, INCLUDING ANY WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, AND NON-INFRINGEMENT. THE COMPANY DOES NOT PROVIDE ANY WARRANTY THAT OPERATION OF ANY SERVICES HEREUNDER WILL BE UNINTERRUPTED OR ERROR-FREE.</p>\r\n<p>10.0 <strong>Miscellaneous Provisions.</strong></p>\r\n<p>10.1. This Agreement, and any accompanying appendices, duplicates, or copies, constitutes the entire agreement between the Parties with respect to the subject matter of this Agreement, and supersedes all prior negotiations, agreements, representations, and understandings of any kind, whether written or oral, between the Parties, preceding the date of this Agreement.</p>\r\n<p>10.2. This Agreement may be amended only by written agreement duly executed by an authorized representative of each party (email is acceptable).</p>\r\n<p>10.3. If any provision or provisions of this Agreement shall be held unenforceable for any reason, then such provision shall be modified to reflect the parties&rsquo; intention. All remaining provisions of this Agreement shall remain in full force and effect for the duration of this Agreement.</p>\r\n<p>10.4. This Agreement shall not be assigned by either party without the express consent of the other party.</p>\r\n<p>10.5. A failure or delay in exercising any right, power or privilege in respect of this Agreement will not be presumed to operate as a waiver, and a single or partial exercise of any right, power or privilege will not be presumed to preclude any subsequent or further exercise, of that right, power or privilege or the exercise of any other right, power or privilege.</p>\r\n<p>10.6. This Agreement is be governed by and construed in accordance with the laws of the State of &shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;[[JURISDICTION STATE]] without reference to any principles of conflicts of laws, which might cause the application of the laws of another state. Any action instituted by either party arising out of this Agreement will only be brought, tried and resolved in the applicable federal or state courts having jurisdiction in the State of &shy;[[JURISDICTION STATE]]. EACH PARTY HEREBY CONSENTS TO THE EXCLUSIVE PERSONAL JURISDICTION AND VENUE OF THE COURTS, STATE AND FEDERAL, HAVING JURISDICTION IN THE STATE OF &shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;[[JURISDICTION STATE]].</p>\r\n<p>The Parties are signing this Agreement on the date stated in the introductory clause.</p>\r\n<p>Your Company</p>\r\n<p>By: _________________________________</p>\r\n<p>Name:</p>\r\n<p>Title:</p>\r\n<p>Other Contractor Name</p>\r\n<p>By:_________________________________</p>\r\n<p>Name:</p>\r\n<p>Title:</p>', 8, 1483724122, 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `zones` text NOT NULL,
  `default` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Salvarea datelor din tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `color`, `zones`, `default`) VALUES
(5, 'Templating', '#d90909', 'a:1:{i:0;s:1:"1";}', 0),
(2, 'Administrator', '#16c03d', 'a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}', 0),
(3, 'Employee', '#402f4a', 'a:1:{i:0;s:1:"0";}', 0);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `increment` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Salvarea datelor din tabel `templates`
--

INSERT INTO `templates` (`id`, `name`, `content`, `increment`, `created`, `owner`) VALUES
(2, 'Non-disclosure Agreement', '<p>THIS AGREEMENT is made and entered into as Date {System.CurrentDate}, by and between Disclosing Party Name, {DisclosingParty} and Recipient Name, {Recipient} (collectively, &ldquo;the Parties&rdquo;).</p>\r\n<p>Purpose for Disclosure {BusinessPurpose}: &nbsp;Give some thought to describing the business purpose so that it is not overly broad or nebulous</p>\r\n<p>The Parties hereby agree as follows:</p>\r\n<p>1. For purposes of this Agreement, "Confidential Information" shall mean any and all non-public information, including, without limitation, technical, developmental, marketing, sales, operating, performance, cost, know-how, business plans, business methods, and process information, disclosed to the Recipient. &nbsp;For convenience, the Disclosing Party may, but is not required to, mark written Confidential Information with the legend "Confidential" or an equivalent designation. &nbsp;</p>\r\n<p>2. All Confidential Information disclosed to the Recipient will be used solely for the Business Purpose and for no other purpose whatsoever. The Recipient agrees to keep the Disclosing Party&rsquo;s Confidential Information confidential and to protect the confidentiality of such Confidential Information with the same degree of care with which it protects the confidentiality of its own confidential information, but in no event with less than a reasonable degree of care. Recipient may disclose Confidential Information only to its employees, agents, consultants and contractors on a need-to-know basis, and only if such employees, agents, consultants and contractors have executed appropriate written agreements with Recipient sufficient to enable Recipient to enforce all the provisions of this Agreement. Recipient shall not make any copies of Disclosing Party&rsquo;s Confidential Information except as needed for the Business Purpose. At the request of Disclosing Party, Recipient shall return to Disclosing Party all Confidential Information of Disclosing Party (including any copies thereof) or certify the destruction thereof.</p>\r\n<p>3. All right title and interest in and to the Confidential Information shall remain with Disclosing Party or its licensors. Nothing in this Agreement is intended to grant any rights to Recipient under any patents, copyrights, trademarks, or trade secrets of Disclosing Party. ALL CONFIDENTIAL INFORMATION IS PROVIDED "AS IS". THE DISCLOSING PARTY MAKES NO WARRANTIES, EXPRESS, IMPLIED OR OTHERWISE, REGARDING NON-INFRINGEMENT OF THIRD PARTY RIGHTS OR ITS ACCURACY, COMPLETENESS OR PERFORMANCE.</p>\r\n<p>4.&nbsp;&nbsp;&nbsp;&nbsp;The obligations and limitations set forth herein regarding Confidential Information shall not apply to information which is: (a) at any time in the public domain, other than by a breach on the part of the Recipient; or (b) at any time rightfully received from a third party which had the right to and transmits it to the Recipient without any obligation of confidentiality.</p>\r\n<p>5.&nbsp;&nbsp;&nbsp;&nbsp;In the event that the Recipient shall breach this Agreement, or in the event that a breach appears to be imminent, the Disclosing Party shall be entitled to all legal and equitable remedies afforded it by law, and in addition may recover all reasonable costs and attorneys'' fees incurred in seeking such remedies. &nbsp;If the Confidential Information is sought by any third party, including by way of subpoena or other court process, the Recipient shall inform the Disclosing Party of the request in sufficient time to permit the Disclosing Party to object to and, if necessary, seek court intervention to prevent the disclosure. &nbsp;</p>\r\n<p>6.&nbsp;&nbsp;&nbsp;&nbsp;The validity, construction and enforceability of this Agreement shall be governed in all respects by the law of the State. This Agreement may not be amended except in writing signed by a duly authorized representative of the respective Parties. This Agreement shall control in the event of a conflict with any other agreement between the Parties with respect to the subject matter hereof.</p>\r\n<p>IN WITNESS WHEREOF, the Parties have executed this Agreement as of the date first above written.</p>', 1, 1483723217, 8),
(1, 'Contract', '<p style="text-align: center;"><strong>INDEPENDENT CONTRACTOR AGREEMENT</strong></p>\r\n<p>This independent contractor agreement (the &ldquo;<strong>Agreement</strong>&rdquo;) is made and entered into as of {AgreementDate} (the &ldquo;<strong>Effective Date</strong>&rdquo;) between&nbsp;Your Company(the &ldquo;<strong>Company</strong>&rdquo;), a US Limited Company, and {ContractorName}, a {ContractorType} (the &ldquo;<strong>Contractor</strong>&rdquo;) (collectively, the &ldquo;<strong>Parties</strong>&rdquo;).</p>\r\n<p>The Company requests the Contractor to perform services for it and may request the Contractor to perform other services in the future; and</p>\r\n<p>The Parties therefore agree as follows:</p>\r\n<p>1.0.<strong>Term and Termination</strong>.</p>\r\n<p>1.1. This Agreement takes effect immediately as of the Effective Date, and remains in full force and effect until the Contractor has completed the Services (the "<strong>Term</strong>"), unless earlier terminated under this Section 1.</p>\r\n<p>1.2. Either Party may terminate this Agreement for cause by providing the other Party written notice if the other Party: (i) is in material breach of this Agreement and has failed to cure such breach within five (5) days after its receipt of written notice of such breach provided by the non-breaching Party; (ii) engages in any unlawful business practice related to that Party''s performance under the Agreement; or (iii) files a petition for bankruptcy, becomes insolvent, acknowledges its insolvency in any manner, ceases to do business, makes an assignment for the benefit of its creditors, or has a receiver, trustee or similar party appointed for its property.</p>\r\n<p>2.0.<strong>Contractor Services.</strong></p>\r\n<p>2.1. During the Term, the Company may engage the Contractor to provide the following services as needed (the "<strong>Services</strong>"), or other such services as mutually agreed upon in writing by the Parties (email is acceptable):</p>\r\n<p>2.2. The Contractor shall provide the necessary equipment to perform the Services. If the Contractor has obtained employees or agents (the "<strong>Contractor Personnel</strong>"), the Contractor shall be solely responsible for all costs associated with the Contractor Personnel.</p>\r\n<p>2.3 As a result of providing the Services, the Contractor or Contractor Personnel may create certain work product (the "<strong>Work Product</strong>").</p>\r\n<p>2.4. The Contractor shall notify the Company of any change(s) to the Contractor&rsquo;s schedule that could adversely affect the availability of the Contractor, whether known or unknown at the time of this Agreement, no later than [_____] prior to such change(s). If the Contractor becomes aware of such change(s) within the [____] period, the Contractor shall promptly notify the Company of such change(s) within a reasonable amount of time.</p>\r\n<p>2.5. The work performed by the Contractor shall be performed at the following rate: [{Rate}]. The Contractor shall issue invoices to the Company''s accounts payable department within [{Days}] days of completing the Services, unless otherwise instructed by the Company, and provide documentation as instructed by the Company''s accounts payable department. The Company shall remit payment to the Contractor within [{Days}] days of receiving the invoice from the Contractor.</p>\r\n<p>2.6. The Company shall not be responsible for federal, state and local taxes derived from the Contractor''s net income or for the withholding and/or payment of any federal, state and local income and other payroll taxes, workers'' compensation, disability benefits or other legal requirements applicable to the Contractor.</p>\r\n<p>3.0.<strong>Independent Contractor Status.</strong></p>\r\n<p>3.1. The Parties intend that the Contractor and any Contractor Personnel be engaged as independent contractors of Company. Nothing contained in this Agreement will be construed to create the relationship of employer and employee, principal and agent, partnership or joint venture, or any other fiduciary relationship.</p>\r\n<p>3.2. The Contractor may not act as agent for, or on behalf of, the Company, or to represent the Company, or bind the Company in any manner.</p>\r\n<p>3.3. The Contractor will not be entitled to worker''s compensation, retirement, insurance or other benefits afforded to employees of the Company.</p>\r\n<p>4.0.<strong>Ownership</strong>.</p>\r\n<p>4.1. The Parties intend that, to the extent the Work Product or a portion of the Work Product qualifies as a "work made for hire," within the definition of Section 101 of the Copyright Act of the United States (17 U.S.C. &sect; 101), it will be so deemed a work made for hire. If the Work Product or any portion of the Work Product does not qualify as work made for hire, and/or as otherwise necessary to ensure the Company''s complete ownership of all rights, titles and interest in the Work Product, the Contractor shall transfer and assign to the Company all rights, titles and interests throughout the world in and to any and all Work Product. This transfer and assignment includes, but is not limited to, the right to publish, distribute, make derivative works of, edit, alter or otherwise use the Work Product in any way the Company sees fit.</p>\r\n<p>4.2. The Company grants the Contractor, a limited, non-exclusive, non-transferable, non-assignable, royalty free, worldwide license to display the Work Product on a platform personally controlled, in whole or in part, by the Contractor. The Company may revoke this license at any time by requesting the removal of the Work Product displayed by the Contractor. Upon such request, the Contractor shall remove the Work Product from the platform, and provide written notification of such removal.</p>\r\n<p>5.0. <strong>Representations.</strong> Both Parties represent that they are fully authorized and empowered to enter into this Agreement, and that the performance of the obligations under this Agreement will not violate or infringe upon the rights of any third-party, or violate any agreement between the Parties and any other person, firm or organization or any law or governmental regulation.</p>\r\n<p>6.0. <strong>Indemnification. </strong>The Contractor shall indemnify and hold harmless the Company, its affiliates, and its respective officers, directors, agents and employees from any and all claims, demands, losses, causes of action, damage, lawsuits, judgments, including attorneys&rsquo; fees and costs, arising out of, or relating to, the Contractor&rsquo;s services under this Agreement.</p>\r\n<p>7.0.<strong>Confidential Information.</strong></p>\r\n<p>7.1 Each Party (on its behalf and on behalf of its subcontractors, employees or representatives, or agents of any kind) agrees to hold and treat all confidential information of the other Party, including, but not limited to, trade secrets, sales figures, employee and customer information and any other information that the receiving Party reasonably should know is confidential (&ldquo;<strong>Confidential Information</strong>&rdquo;) as confidential and protect the Confidential Information with the same degree of care as each Party uses to protect its own Confidential Information of like nature.</p>\r\n<p>7.2 Confidential Information does not include any information that (i) at the time of the disclosure or thereafter is lawfully obtained from publically available sources generally known by the public (other than as a result of a disclosure by the receiving Party or its representatives); (ii) is available to the receiving Party on a non-confidential basis from a source that is not and was not bound by a confidentiality agreement with respect to the Confidential Information; or (iii) has been independently acquired or developed by the receiving Party without violating its obligations under this Agreement or under any federal or state law.</p>\r\n<p>8.0. <strong>Liability. </strong>EXCEPT WITH RESPECT TO THE PARTIES&rsquo; INDEMNIFICATION OBLIGATIONS, NEITHER PARTY SHALL BE LIABLE TO THE OTHER FOR ANY SPECIAL, INDIRECT, INCIDENTAL, PUNITIVE, OR CONSEQUENTIAL DAMAGES ARISING FROM OR RELATED TO THIS AGREEMENT, INCLUDING BODILY INJURY, DEATH, LOSS OF REVENUE, OR PROFITS OR OTHER BENEFITS, AND CLAIMS BY ANY THIRD PARTY, EVEN IF THE PARTIES HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. THE FOREGOING LIMITATION APPLIES TO ALL CAUSES OF ACTION IN THE AGGREGATE, INCLUDING WITHOOUT LIMITATION TO BREACH OF CONTRACT, BREACH OF WARRANTY, NEGLIGENCE, STRICT LIABILITY, AND OTHER TORTS.</p>\r\n<p>9.0. <strong>Disclaimer of Warranty. </strong>THE WARRANTIES CONTAINED HEREIN ARE THE ONLY WARRANTIES MADE BY THE PARTIES HEREUNDER. EACH PARTY MAKES NO OTHER WARRANTY, WHETHER EXPRESS OR IMPLIED, AND EXPRESSLY EXCLUDES AND DISCLAIMS ALL OTHER WARRANTIES AND REPRESENTATIONS OF ANY KIND, INCLUDING ANY WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, AND NON-INFRINGEMENT. THE COMPANY DOES NOT PROVIDE ANY WARRANTY THAT OPERATION OF ANY SERVICES HEREUNDER WILL BE UNINTERRUPTED OR ERROR-FREE.</p>\r\n<p>10.0 <strong>Miscellaneous Provisions.</strong></p>\r\n<p>10.1. This Agreement, and any accompanying appendices, duplicates, or copies, constitutes the entire agreement between the Parties with respect to the subject matter of this Agreement, and supersedes all prior negotiations, agreements, representations, and understandings of any kind, whether written or oral, between the Parties, preceding the date of this Agreement.</p>\r\n<p>10.2. This Agreement may be amended only by written agreement duly executed by an authorized representative of each party (email is acceptable).</p>\r\n<p>10.3. If any provision or provisions of this Agreement shall be held unenforceable for any reason, then such provision shall be modified to reflect the parties&rsquo; intention. All remaining provisions of this Agreement shall remain in full force and effect for the duration of this Agreement.</p>\r\n<p>10.4. This Agreement shall not be assigned by either party without the express consent of the other party.</p>\r\n<p>10.5. A failure or delay in exercising any right, power or privilege in respect of this Agreement will not be presumed to operate as a waiver, and a single or partial exercise of any right, power or privilege will not be presumed to preclude any subsequent or further exercise, of that right, power or privilege or the exercise of any other right, power or privilege.</p>\r\n<p>10.6. This Agreement is be governed by and construed in accordance with the laws of the State of &shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;[[JURISDICTION STATE]] without reference to any principles of conflicts of laws, which might cause the application of the laws of another state. Any action instituted by either party arising out of this Agreement will only be brought, tried and resolved in the applicable federal or state courts having jurisdiction in the State of &shy;[[JURISDICTION STATE]]. EACH PARTY HEREBY CONSENTS TO THE EXCLUSIVE PERSONAL JURISDICTION AND VENUE OF THE COURTS, STATE AND FEDERAL, HAVING JURISDICTION IN THE STATE OF &shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;&shy;[[JURISDICTION STATE]].</p>\r\n<p>The Parties are signing this Agreement on the date stated in the introductory clause.</p>\r\n<p>Your Company</p>\r\n<p>By: _________________________________</p>\r\n<p>Name:</p>\r\n<p>Title:</p>\r\n<p>{ContractorName}</p>\r\n<p>By:_________________________________</p>\r\n<p>Name:</p>\r\n<p>Title:</p>', 1, 1483722701, 8),
(3, 'Invoice', '<p>&nbsp;</p>\r\n<table style="width: 100%;">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<h2>Company Name</h2>\r\n<p>My street address here, Short description</p>\r\n<p>Bucharest, Romania, 150112</p>\r\n<p>Phone: +40 12 12311</p>\r\n</td>\r\n<td style="text-align: right;" align="right">\r\n<h1 style="text-align: right;"><span style="color: #333399;"><strong>INVOICE</strong></span></h1>\r\n<strong>No: #{System.Increment}</strong><br /> <strong>Date:&nbsp;{System.CurrentDate}</strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style="height: 187px; border: 1px solid #5C5C5C;" width="182">\r\n<tbody>\r\n<tr>\r\n<td style="padding: 3px; background-color: #d9d9d9; font-weight: bold; font-size: 20px;">BILL TO</td>\r\n</tr>\r\n<tr>\r\n<td>{CompanyName}<br /> {StreetAddress}<br /> {City}<br /> {Zipcode}<br /> {Phone}<br /> {Email}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style="width: 100%; border: 1px solid #5C5C5C; margin-top: 10px;">\r\n<tbody>\r\n<tr>\r\n<td style="padding: 5px; background-color: #d9d9d9; font-weight: bold; font-size: 21px;">No</td>\r\n<td style="padding: 5px; background-color: #d9d9d9; font-weight: bold; font-size: 21px;">Description</td>\r\n<td style="padding: 5px; background-color: #d9d9d9; font-weight: bold; font-size: 21px;">Qty</td>\r\n<td style="padding: 5px; background-color: #d9d9d9; font-weight: bold; font-size: 21px;">Amount</td>\r\n</tr>\r\n<tr>\r\n<td>1</td>\r\n<td>{ProductDescription}</td>\r\n<td>{ProductQuantity}</td>\r\n<td style="font-weight: bold;" align="right">{ProductAmount}</td>\r\n</tr>\r\n<tr>\r\n<td colspan="4">&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td colspan="2" align="center">Thank you for your collaboration!</td>\r\n<td colspan="2" align="center">\r\n<table style="font-weight: bold; font-size: 24px;" width="100%">\r\n<tbody>\r\n<tr>\r\n<td>TOTAL</td>\r\n<td align="right">{ProductAmount}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 2, 1483722320, 8);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `role` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `name`, `surname`, `date`, `role`) VALUES
(1, 'adipetcu@yahoo.com', 'employee', 'fa3b18057775f49bb013d1a3ef7c5894', 'Employee', '', 1480861674, 3);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `variables`
--

CREATE TABLE IF NOT EXISTS `variables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Salvarea datelor din tabel `variables`
--

INSERT INTO `variables` (`id`, `template`, `name`, `token`) VALUES
(74, 3, 'Company Name', '{CompanyName}'),
(75, 3, 'Street Address', '{StreetAddress}'),
(76, 3, 'City', '{City}'),
(77, 3, 'Zipcode', '{Zipcode}'),
(78, 3, 'Phone', '{Phone}'),
(79, 3, 'Email', '{Email}'),
(80, 3, 'Product Description', '{ProductDescription}'),
(81, 3, 'Product Quantity', '{ProductQuantity}'),
(82, 3, 'Product Amount', '{ProductAmount}'),
(83, 1, 'AgreementDate', '{AgreementDate}'),
(84, 1, 'Company Name', '{CompanyName}'),
(85, 1, 'Contractor Name', '{ContractorName}'),
(86, 1, 'Contractor Type', '{ContractorType}'),
(87, 1, 'Days', '{Days}'),
(88, 1, 'Rate', '{Rate}'),
(89, 2, 'Disclosing Party', '{DisclosingParty}'),
(90, 2, 'Recipient', '{Recipient}'),
(91, 2, 'Business Purpose', '{BusinessPurpose}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
