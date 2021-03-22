<?php


namespace Mitquinn\BoxApiSdk\Traits;

use Illuminate\Support\Collection;
use Mitquinn\BoxApiSdk\Resources\Folder;
use Mitquinn\BoxApiSdk\Resources\User;

/**
 * Trait HasResourcePropertyChecks
 * @package Mitquinn\BoxApiSdk\Traits
 */
trait HasResourcePropertyChecks
{

    /**
     * This is a gigantic "stupid" function. All it does is check if the collection has a value and assigns it.
     * @param Collection $collection
     * @return $this
     * @noinspection PhpUndefinedMethodInspection
     */
    public function setProperties(Collection $collection): static
    {

        // Todo: This is a weird object
        if ($collection->has('acceptance_requirements_status')) {
            $this->setAcceptanceRequirementsStatus($collection->get('acceptance_requirements_status'));
        }

        // Todo: Convert to User Mini
        if ($collection->has('accessible_by')) {
            $this->setAccessibleBy(new User($collection->get('accessible_by')));
        }

        if ($collection->has('acknowledged_at')) {
            $this->setAcknowledgedAt($collection->get('acknowledged_at'));
        }

        if ($collection->has('action')) {
            $this->setAction($collection->get('action'));
        }

        if ($collection->has('additional_details')) {
            $this->setAdditionalDetails($collection->get('additional_details'));
        }

        if ($collection->has('allowed_invitee_roles')) {
            $this->setAllowedInviteeRoles($collection->get('allowed_invitee_roles'));
        }

        if ($collection->has('assigned_at')) {
            $this->setAssignedAt($collection->get('assigned_at'));
        }

        if ($collection->has('assigned_by')) {
            $this->setAssignedBy(new User($collection->get('assigned_by')));
        }

        if ($collection->has('assigned_to')) {
            $this->setAssignedTo(new User($collection->get('assigned_to')));
        }

        if ($collection->has('chunk_size')) {
            $this->setChunkSize($collection->get('chunk_size'));
        }

        if ($collection->has('classification')) {
            $this->setClassification($collection->get('classification'));
        }

        if ($collection->has('collection_type')) {
            $this->setCollectionType($collection->get('collection_type'));
        }

        if ($collection->get('comment_count')) {
            $this->setCommentCount($collection->get('comment_count'));
        }

        if ($collection->has('completed_at')) {
            $this->setCompletedAt($collection->get('completed_at'));
        }

        if ($collection->has('completion_rule')) {
            $this->setCompletionRule($collection->get('completion_rule'));
        }

        if ($collection->has('content_created_at')) {
            $this->setContentCreatedAt($collection->get('content_created_at'));
        }

        if ($collection->has('content_modified_at')) {
            $this->setContentModifiedAt($collection->get('content_modified_at'));
        }

        if ($collection->has('created_at')) {
            $this->setCreatedAt($collection->get('created_at'));
        }

        //Todo: Convert to user mini
        if ($collection->has('created_by')) {
            $this->setCreatedBy(new User($collection->get('created_by')));
        }

        if ($collection->has('description')) {
            $this->setDescription($collection->get('description'));
        }

        if ($collection->has('due_at')) {
            $this->setDueAt($collection->get('due_at'));
        }

        if ($collection->has('etag')) {
            $this->setEtag($collection->get('etag'));
        }

        if ($collection->has('email')) {
            $this->setEmail($collection->get('email'));
        }

        if ($collection->has('event_id')) {
            $this->setEventId($collection->get('event_id'));
        }

        if ($collection->has('event_type')) {
            $this->setEventType($collection->get('event_type'));
        }

        if ($collection->has('expires_at')) {
            $this->setExpiresAt($collection->get('expires_at'));
        }

        if ($collection->has('expiring_embed_link')) {
            $this->setExpiringEmbedLink($collection->get('expiring_embed_link'));
        }

        if ($collection->has('extension')) {
            $this->setExtension($collection->get('extension'));
        }

        if ($collection->has('has_collaborations')) {
            $this->setHasCollaborations($collection->get('has_collaborations'));
        }

        if ($collection->has('file_version')) {
            $this->setFileVersion($collection->get('file_version'));
        }

        if ($collection->has('id')) {
            $this->setId($collection->get('id'));
        }

        if ($collection->has('invite_email')) {
            $this->setInviteEmail($collection->get('invite_email'));
        }

        if ($collection->has('is_complete')) {
            $this->setIsComplete($collection->get('is_complete'));
        }

        if ($collection->has('is_confirmed')) {
            $this->setIsConfirmed($collection->get('is_confirmed'));
        }

        if ($collection->has('is_reply_comment')) {
            $this->setIsReplyComment($collection->get('is_reply_comment'));
        }

        if ($collection->has('is_externally_owned')) {
            $this->setIsExternallyOwned($collection->get('is_externally_owned'));
        }

        if ($collection->has('is_package')) {
            $this->setIsPackage($collection->get('is_package'));
        }

        if ($collection->has('item_status')) {
            $this->setItemStatus($collection->get('item_status'));
        }

        if ($collection->has('lock')) {
            $this->setLock($collection->get('lock'));
        }

        if ($collection->has('message')) {
            $this->setMessage($collection->get('message'));
        }

        if ($collection->has('metadata')) {
            $this->setMetadata($collection->get('metadata'));
        }

        if ($collection->has('modified_at')) {
            $this->setModifiedAt($collection->get('modified_at'));
        }

        //Todo: Convert to UserMini
        if ($collection->has('modified_by')) {
            $this->setModifiedBy(new User($collection->get('modified_by')));
        }

        if ($collection->has('name')) {
            $this->setName($collection->get('name'));
        }

        if ($collection->has('next_stream_position')) {
            $this->setNextStreamPosition($collection->get('next_stream_position'));
        }

        // Todo: Convert to User Mini
        if ($collection->has('owned_by')) {
            $this->setOwnedBy(new User($collection->get('owned_by')));
        }

        // Todo: Convert to Folder Mini
        if ($collection->has('parent')) {
            $this->setParent(new Folder($collection->get('parent')));
        }

        if ($collection->has('path_collection')) {
            $this->setPathCollection($collection->get('path_collection'));
        }

        if ($collection->has('permissions')) {
            $this->setPermissions($collection->get('permissions'));
        }

        if ($collection->has('purged_at')) {
            $this->setPurgedAt($collection->get('purged_at'));
        }

        if ($collection->has('reminded_at')) {
            $this->setRemindedAt($collection->get('reminded_at'));
        }

        if ($collection->has('representations')) {
            $this->setRepresentations($collection->get('representations'));
        }

        if ($collection->has('resolution_state')) {
            $this->setResolutionState($collection->get('resolution_state'));
        }

        if ($collection->has('role')) {
            $this->setRole($collection->get('role'));
        }

        if ($collection->has('sequence_id')) {
            $this->setSequenceId($collection->get('sequence_id'));
        }

        if ($collection->has('session_id')) {
            $this->setSessionId($collection->get('session_id'));
        }

        if ($collection->has('sha1')) {
            $this->setSha1($collection->get('sha1'));
        }

        if ($collection->has('shared_link')) {
            $this->setSharedLink($collection->get('shared_link'));
        }

        if ($collection->has('size')) {
            $this->setSize($collection->get('size'));
        }

        if ($collection->has('status')) {
            $this->setStatus($collection->get('status'));
        }

        if ($collection->has('tags')) {
            $this->setTags($collection->get('tags'));
        }

        if ($collection->has('total_count')) {
            $this->setTotalCount($collection->get('total_count'));
        }

        if ($collection->has('tagged_message')) {
            $this->setTaggedMessage($collection->get('tagged_message'));
        }

        if ($collection->has('trashed_at')) {
            $this->setTrashedAt($collection->get('trashed_at'));
        }

        if ($collection->has('type')) {
            $this->setType($collection->get('type'));
        }

        if ($collection->has('uploader_display_name')) {
            $this->setUploaderDisplayName($collection->get('uploader_display_name'));
        }

        if ($collection->has('url')) {
            $this->setUrl($collection->get('url'));
        }

        if ($collection->has('version_number')) {
            $this->setVersionNumber($collection->get('version_number'));
        }

        if ($collection->has('watermark_info')) {
            $this->setWatermarkInfo($collection->get('watermark_info'));
        }

        return $this;
    }

}