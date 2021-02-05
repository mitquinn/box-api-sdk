# box-api-sdk
This is an unofficial Box.com API SDK.

Author: Mitchell Quinn <mitchell.david.quinn@gmail.com>

## High Level Todo: 
* Total Api Requests Included
* 27/188 Requests
* Estimated time for completion April 6th

### General
- [x] Create shared property traits - 1/9/21
- [x] add shared traits to folder/files resources - 1/10/21
- [ ] Rename Collections to something else
- [x] Write ReadMe 1/27/21
- [ ] Create Technical Overview
- [x] Copy over things that have been done to the new ReadMe 1/28/21 

### Authorization Api
- [ ] AccessToken Resource
- [ ] Authorization Collection
- [ ] Authorize User
- [ ] Request Access Token
- [ ] Refresh Access Token
- [ ] Revoke Access Token

### Classifications
- [ ] Classification Collection
- [ ] Classification Resource
- [ ] Classification Template
- [ ] List All Classifications
- [ ] Add Initial Classification
- [ ] Add Classification
- [ ] Update Classification
- [ ] Delete Classification
- [ ] Delete All Classifications

### Classifications on Files
- [ ] Get Classification on File
- [ ] Add Classification to File
- [ ] Update Classification on File
- [ ] Remove Classification from File

### Classifications on Folders
- [ ] Get Classification on Folder
- [ ] Add Classification to Folder
- [ ] Update Classification on Folder
- [ ] Remove Classification from Folder

### Collaborations
- [x] Collaborations Collection 1/16/21
    - [x] Refactored 2/5/21
- [x] Collaboration Resource 1/14/21
- [x] Collaborations Resource 1/17/21
- [x] Get Collaboration 1/16/21
    - [x] Refactored 2/5/21
- [x] Create Collaboration 1/15/21
    - [x] Refactored 2/5/21
- [x] Update Collaboration 1/16/21
    - [x] Refactored 2/5/21
- [x] Remove Collaboration 1/16/21
    - [x] Refactored 2/5/21



### Collaborations (List)
- [x] List File Collaborations 1/18/21
    - [x] Refactored 2/3/21
- [x] List Folder Collaborations 1/17/21
- [x] List Pending Collaborations 1/18/21
    - [x] Refactored 2/5/21
- [x] List Collaborations for Group 1/18/21

### Collections
- [ ] Collections Collection
- [ ] Collection Resource
- [ ] Collections Resource
- [ ] List all Collections
- [ ] List Collection items

### Comments
- [ ] Comments Collection
- [ ] Comment Resource
- [ ] Comments Resource
- [ ] List File Comments
- [ ] Get Comment
- [ ] Create Comment
- [ ] Update Comment
- [ ] Remove Comment

### Device Pinners 
- [ ] DevicePinners Collection
- [ ] DevicePinner Resource
- [ ] DevicePinners Resource
- [ ] Get Device Pin
- [ ] List Enterprise Device Pin
- [ ] Remove Device Pin
  
### Domain Restrictions (User Exemptions)
- [ ] AllowedCollaborationDomainsUsers Collection
- [ ] AllowedCollaborationDomainsUserExemption Resource
- [ ] AllowedCollaborationDomainsUserExemptions Resource
- [ ] List Users exempt from collaboration domain restrictions
- [ ] Get User exempt from collaboration domain restrictions
- [ ] Create User exempt from collaboration domain restrictions
- [ ] Remove Users exempt from collaboration domain restrictions

### Domain Restrictions for Collaborations
- [ ] AllowedCollaborationDomain Collection
- [ ] AllowedCollaborationDomain Resource
- [ ] AllowedCollaborationDomains Resource
- [ ] List allowed Collaboration Domains
- [ ] Get allowed Collaboration Domain
- [ ] Add Domain to list of allowed Collaboration Domains
- [ ] Remove Domain from list of allowed Collaboration Domains

### Downloads
- [ ] Download file
  
### Email Aliases
- [ ] EmailAlias Resource
- [ ] EmailAliases Resource
- [ ] EmailAliases Collection
- [ ] List user's email aliases
- [ ] Create email alias
- [ ] Remove email alias

### Events
- [ ] Event Resource
- [ ] Events Resource
- [ ] Real-time servers
- [ ] List user and enterprise events
- [ ] Get events long pool endpoint

### File Requests
- [ ] FileRequest Resource
- [ ] File Request Collection
- [ ] Get file request
- [ ] Copy file request
- [ ] Update file request
- [ ] Delete file request

### File Version Legal Holds
- [ ] FileVersionLegalHold Resource
- [ ] FileVersionLegalHolds Resource
- [ ] FileVersionLegalHolds Collection
- [ ] Get file version legal hold
- [ ] List file version legal holds

### File Version Retentions
- [ ] FileVersionRetention Resource
- [ ] FileVersionRetentions Resource
- [ ] FileVersionRetentions Collection
- [ ] Get retention on file
- [ ] List file version retentions

### File Versions
- [ ] FileVersion Resource
- [ ] FileVersions Resource
- [ ] FileVersions Collection
- [ ] List all File Version
- [ ] Get File Version
- [ ] Revert File Version
- [ ] Remove File Version

### Files
- [x] Files Collection 2/3/21
- [x] File Resource 1/7/21
- [x] File(Full) Resource 1/7/21
- [ ] File(Mini) Resource
- [ ] File(Base) Resource
- [x] Files Resource 1/7/21
- [x] Get File information 1/10/21
    - [x] Refactored 2/3/21
- [x] Get File Thumbnail 1/10/21
    - [x] Refactored 2/3/21
- [x] Copy File 1/11/21
  - [x] Refactored 2/3/21
- [x] Update File 2/3/21
- [x] Delete File 1/10/21
    - [x] Refactored 2/2/21
  
### Folder Locks
- [ ] FolderLock Resource
- [ ] FolderLocks Resource
- [ ] FolderLocks Collection
- [ ] List Folder locks on folder
- [ ] Create Folder lock on folder
- [ ] Delete Folder lock
  
### Folders
- [x] Folder Resource 1/1/21
- [x] Folder Full Resource 1/1/21
- [ ] Folder Mini Resource
- [ ] Folder Base Resource
- [x] Items Resource 1/1/21
- [x] Folders Collection 1/3/21
  - [x] Refactored 2/1/21  
- [x] Get Folder Information 1/1/2
    - [x] Refactored 2/1/21
- [x] List items in folder 1/1/21
    - [x] Refactored 2/1/21
- [x] Create Folder 1/1/21
    - [x] Refactored 1/30/21
- [x] Copy Folder 1/3/21
    - [x] Refactored 2/1/21
- [x] Update Folder 1/3/21
    - [x] Refactored 2/1/21
- [x] Delete Folder 1/2/21
    - [x] Refactored 1/30/21

### Group Memberships
- [x] GroupMembership Resource 1/21/21
- [x] GroupMemberships Resource 1/20/21
- [x] GroupMemberships Collection 1/23/21
    - [x] Refactored 2/4/21
- [x] List User's Groups 1/20/21
    - [x] Refactored 2/4/21
- [x] List members of Group 1/20/21
    - [x] Refactored 2/4/21
- [x] Get Group Membership 1/21/21
    - [x] Refactored 2/4/21  
- [x] Add user to Group 1/22/21
    - [x] Refactored 2/4/21
- [x] Update Group Membership 1/22/21
    - [x] Refactored 2/4/21
- [x] Remove user from group 1/23/21
    - [x] Refactored 2/4/21

### Groups
- [x] Group Resource 1/18/21
- [x] Groups Resource 1/18/21
- [x] Groups Collection 1/18/21
    - [x] Refactored 2/4/21
- [ ] Group Base Resource 1/18/21
- [ ] Group Mini Resource 1/18/21
- [x] Group Full Resource 1/18/21
- [x] List Groups for enterprise 1/18/21
    - [x] Refactored 2/4/21
- [x] Get Group 1/18/21
    - [x] Refactored 2/4/21
- [x] Create Group 1/18/21
    - [x] Refactored 2/4/21
- [x] Update Group 1/18/21
    - [x] Refactored 2/4/21
- [x] Remove Group 1/18/21
  
### Invites
- [ ] Invite Resource
- [ ] Invites Collection
- [ ] Get User Invite Status
- [ ] Create User Invite

### Legal Hold Policies
- [ ] LegalHoldPolicy Resource
- [ ] LegalHoldPolicies Resource
- [ ] LegalHoldPolicy Mini Resource
- [ ] Legal Hold Policies Collection
- [ ] List Legal Hold Policy Assignments
- [ ] Get Legal Hold Policy Assignment
- [ ] List current file version for legal hold policy assignment
- [ ] List previous file versions for legal hold policy assignment
- [ ] Assign legal hold policy
- [ ] Unassign legal hold policy

### Metadata Cascade Policies
- [ ] MetadataCascadePolicy Resource
- [ ] MetadataCascadePolicies Resource
- [ ] MetadataCascadePolicies Collection
- [ ] List Metadata Cascade Policies
- [ ] Get Metadata Cascade Policy
- [ ] Create metadata cascade policy
- [ ] Force-apply metadata cascade policy to folder
- [ ] Remove Metadata Cascade Policy
  
### Metadata Instances (Files)
- [ ] MetadataInstance Resource
- [ ] MetadataInstance Full Resource
- [ ] MetadataInstance Base Resource
- [ ] MetadataInstances Resource
- [ ] MetadataInstances Collection
- [ ] List metadata instances on file
- [ ] Get metadata instance on file
- [ ] Create metadata instance on file
- [ ] Update metadata instance on file
- [ ] Remove metadata instance from file

### Metadata Instances (Folders)
- [ ] List metadata instances on folder
- [ ] Get metadata instance on folder
- [ ] Create metadata instance on folder
- [ ] Update metadata instance on folder
- [ ] Remove metadata instance from folder
  
### Metadata Templates
- [ ] Metadata template Resource
- [ ] Metadata templates Resource
- [ ] Metadata templates Collection
- [ ] Find metadata template by instance ID 
- [ ] Get metadata template by name 
- [ ] Get metadata template by ID 
- [ ] List all global metadata templates 
- [ ] List all metadata templates for enterprise 
- [ ] Create metadata template 
- [ ] Update metadata template 
- [ ] Remove metadata template 
  
### Recent Items
- [ ] Recent Items Resource
- [ ] Recent Items Collection
- [ ] List Recently access items
  
### Retention Polices
- [ ] Retention policies Resource
- [ ] Retention policies Collection
- [ ] Retention policy Resource
- [ ] Retention policy (Mini) Resource
- [ ] Retention policy (Base) Resource
- [ ] List retention policies
- [ ] Get retention policy
- [ ] Create retention policy
- [ ] Update retention policy
  
### Retention Policy Assignments
- [ ] Retention policy assignment Resource 
- [ ] Retention policy assignments Resource 
- [ ] Retention policy assignments Collection 
- [ ] List retention policy assignments 
- [ ] Get retention policy assignment 
- [ ] Assign retention policy
  
### Search
- [ ] Metadata query search results  Resource
- [ ] Search Results Resource
- [ ] Search Results (including Shared Links) Resource
- [ ] Search Result (including Shared Link) Resource
- [ ] Metadata filter Resource
- [ ] Search for content 
- [ ] Query files/folders by metadata 

### Shared Links (Files)
- [ ] Find file for shared link 
- [ ] Get shared link for file 
- [ ] Add shared link to file 
- [ ] Update shared link on file 
- [ ] Remove shared link from file

### Shared Links  (Folders)
- [ ] Find folder for shared link
- [ ] Get shared link for folder
- [ ] Add shared link to folder
- [ ] Update shared link on folder
- [ ] Remove shared link from folder
  
### Skills
- [ ] Skill webhook payload Resource
- [ ] Skills metadata instance Resource
- [ ] Skill Card Resource
- [ ] Keyword Skill Card Resource
- [ ] Timeline Skill Card Resource
- [ ] Transcript Skill Card Resource
- [ ] Status Skill Card Resource
- [ ] List Box Skill cards on file
- [ ] Create Box Skill cards on file
- [ ] Update Box Skill cards on file
- [ ] Update all Box Skill cards on file
- [ ] Remove Box Skill cards from file
- [ ] Skill Collection
  
### Storage Polices
- [ ] Storage policy Resource
- [ ] Storage policies Resource
- [ ] Storage policies Collection
- [ ] Storage policy (Mini) Resource
- [ ] List storage policies
- [ ] Get storage policy
  
### Storage Policy Assignments
- [ ] Storage policy assignment Resource
- [ ] Storage policy assignments Resource
- [ ] Storage policy assignments Collection
- [ ] List storage policy assignments
- [ ] Get storage policy assignment
- [ ] Assign storage policy
- [ ] Update storage policy assignment
- [ ] Unassign storage policy
  
### Task Assignments
- [ ] Task assignment Resource
- [ ] Task assignments Resource
- [ ] Task assignments Collection
- [ ] List task assignments 
- [ ] Get task assignment 
- [ ] Assign task 
- [ ] Update task assignment 
- [ ] Unassign task 
  
### Tasks
- [ ] Task Resource 
- [ ] Tasks Resource
- [ ] Tasks Collection
- [ ] List tasks on file 
- [ ] Get task 
- [ ] Create task 
- [ ] Update task 
- [ ] Remove task 
  
### Terms of Service
- [ ] Terms of service Resource
- [ ] Terms of services Resource
- [ ] Terms of services Collection
- [ ] Terms of service (Mini) Resource
- [ ] List terms of services 
- [ ] Get terms of service 
- [ ] Create terms of service 
- [ ] Update terms of service 

### Terms of Service User Statuses
- [ ] Terms of service user status Resource
- [ ] Terms of service user statuses Resource
- [ ] Terms of service user statuses Collection
- [ ] List terms of service user statuses 
- [ ] Create terms of service status for new user 
- [ ] Update terms of service status for existing user 
  
### Transfer Folders
- [ ] Transfer Owned Folders
  
### Trashed Files
- [ ] Get trashed file 
- [ ] Restore file 
- [ ] Permanently remove file 

### Trashed Folders
- [ ] Get trashed folder
- [ ] Restore folder
- [ ] Permanently remove folder
  
### Trashed Items
- [ ] List Trashed Items
  
### Trashed Web Links
- [ ] Get trashed web link
- [ ] Restore web link
- [ ] Permanently remove web link
  
### Uploads
- [ ] Conflict error Resource
- [ ] Upload URL Resource
- [ ] Preflight check before upload
- [ ] Upload file version
- [x] Upload file
    - [x] Refactored 2/2/21
  
### Uploads (Chunked)
- [ ] Upload part Resource
- [ ] Upload part (Mini) Resource
- [ ] Uploaded part Resource
- [ ] Upload parts Resource
- [ ] Upload session Resource
- [ ] Get upload session
- [ ] List parts
- [ ] Create upload session
- [ ] Create upload session for existing file
- [ ] Commit upload session
- [ ] Upload part of file
- [ ] Remove upload session
  
### User Avatars
- [ ] Get User Avatar
  
### Users
- [x] User Resource
- [x] Users Resource 1/1/21
- [x] Users Collection 1/1/21
    - [x] Refactored 2/2/21
- [x] User (Full) Resource 1/1/21
- [ ] User (Mini) Resource
- [ ] User (Base) Resource
- [x] List enterprise users 1/1/21
    - [x] Refactored 2/1/21
- [x] Get current user 1/1/21
    - [x] Refactored 2/1/21  
- [x] Get user 1/1/21
    - [x] Refactored 2/2/21
- [ ] Create user
- [x] Update user 1/1/21
    - [x] Refactored 2/2/21
- [ ] Delete user
  
### Watermarks (Files)
- [ ] Watermark Resource
- [ ] Watermark Collection
- [ ] Get watermark on file
- [ ] Apply watermark to file
- [ ] Remove watermark from file
  
### Watermarks (Folders)
- [ ] Get watermark for folder
- [ ] Apply watermark to folder
- [ ] Remove watermark from folder
  
### Web Links
- [ ] Web link Resource
- [ ] Web link Collection
- [ ] Web link (Base) Resource
- [ ] Web link (Mini) Resource
- [ ] Get web link
- [ ] Create web link
- [ ] Update web link
- [ ] Remove web link
  
### Webhooks
- [ ] Webhook (V2) payload Resource
- [ ] Webhook Resource
- [ ] Webhooks Resource
- [ ] Webhooks Collection
- [ ] List all webhooks
- [ ] Get webhook
- [ ] Create webhook
- [ ] Update webhook
- [ ] Remove webhook
  
### Zip Downloads
- [ ] Zip download Resource
- [ ] Zip download status Resource
- [ ] Download zip archive
- [ ] Get zip download status
- [ ] Create zip download

### Good Ideas
- [ ]



