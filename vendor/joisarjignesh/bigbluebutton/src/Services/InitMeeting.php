<?php

namespace JoisarJignesh\Bigbluebutton\Services;

use BigBlueButton\Parameters\CreateMeetingParameters;
use BigBlueButton\Parameters\EndMeetingParameters;
use BigBlueButton\Parameters\GetMeetingInfoParameters;
use BigBlueButton\Parameters\IsMeetingRunningParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;
use Illuminate\Support\Str;

trait InitMeeting
{
    /**
     * @param array $parameters
     *
     * required fields
     * meetingID
     * meetingName
     * optional fields
     * moderatorPW
     * attendeePW
     *
     * @return CreateMeetingParameters
     */
    public function initCreateMeeting(array $parameters)
    {
        $request = Fluent($parameters);
        $meetingParams = new CreateMeetingParameters($request->meetingID, $request->meetingName);
        $meetingParams->setModeratorPassword($request->get('moderatorPW', Str::random(config('bigbluebutton.create.passwordLength', 8))));
        $meetingParams->setAttendeePassword($request->get('attendeePW', Str::random(config('bigbluebutton.create.passwordLength', 8))));
        $meetingParams->setDuration($request->get('duration', config('bigbluebutton.create.duration', 0)));
        $meetingParams->setRecord($request->get('record', config('bigbluebutton.create.record', false)));
        $meetingParams->setMaxParticipants($request->get('maxParticipants', config('bigbluebutton.create.maxParticipants', 0)));
        $meetingParams->setLogoutUrl($request->get('logoutUrl', config('bigbluebutton.create.logoutUrl', null)));
        $meetingParams->setWelcomeMessage(
            $request->get('welcomeMessage', config('bigbluebutton.create.welcomeMessage', null))
        );
        $meetingParams->setDialNumber(
            $request->get('dialNumber', config('bigbluebutton.create.dialNumber', null))
        );
        $meetingParams->setBreakout(
            $request->get('isBreakout', config('bigbluebutton.create.isBreakout', false))
        );
        $meetingParams->setModeratorOnlyMessage(
            $request->get('moderatorOnlyMessage', config('bigbluebutton.create.moderatorOnlyMessage', null))
        );
        $meetingParams->setAutoStartRecording(
            $request->get('autoStartRecording', config('bigbluebutton.create.autoStartRecording', false))
        );
        $meetingParams->setAllowStartStopRecording(
            $request->get('allowStartStopRecording', config('bigbluebutton.create.allowStartStopRecording', true))
        );
        $meetingParams->setWebcamsOnlyForModerator(
            $request->get('webcamsOnlyForModerator', config('bigbluebutton.create.webcamsOnlyForModerator', false))
        );
        $meetingParams->setLogo(
            $request->get('logo', config('bigbluebutton.create.logo', null))
        );
        $meetingParams->setCopyright(
            $request->get('copyright', config('bigbluebutton.create.copyright', null))
        );
        $meetingParams->setMuteOnStart(
            $request->get('muteOnStart', config('bigbluebutton.create.muteOnStart', false))
        );

        $meetingParams->setLockSettingsDisableCam(
            $request->get('lockSettingsDisableCam', config('bigbluebutton.create.lockSettingsDisableCam', false))
        );
        $meetingParams->setLockSettingsDisableMic(
            $request->get('lockSettingsDisableMic', config('bigbluebutton.create.lockSettingsDisableMic', false))
        );
        $meetingParams->setLockSettingsDisablePrivateChat(
            $request->get('lockSettingsDisablePrivateChat', config('bigbluebutton.create.lockSettingsDisablePrivateChat', false))
        );
        $meetingParams->setLockSettingsDisablePublicChat(
            $request->get('lockSettingsDisablePublicChat', config('bigbluebutton.create.lockSettingsDisablePublicChat', false))
        );
        $meetingParams->setLockSettingsDisableNote(
            $request->get('lockSettingsDisableNote', config('bigbluebutton.create.lockSettingsDisableNote', false))
        );
        $meetingParams->setLockSettingsLockedLayout(
            $request->get('lockSettingsLockedLayout', config('bigbluebutton.create.lockSettingsLockedLayout', false))
        );
        $meetingParams->setLockSettingsLockOnJoin(
            $request->get('lockSettingsLockOnJoin', config('bigbluebutton.create.lockSettingsLockOnJoin', false))
        );
        $meetingParams->setLockSettingsLockOnJoinConfigurable(
            $request->get('lockSettingsLockOnJoinConfigurable', config('bigbluebutton.create.lockSettingsLockOnJoinConfigurable', false))
        );

        if (! is_null($request->get('endCallbackUrl', null))) {
            $meetingParams->setEndCallbackUrl($request->get('endCallbackUrl', null));
        }

        if (! is_null($request->get('bbb-recording-ready-url', null))) {
            $meetingParams->setRecordingReadyCallbackUrl($request->get('bbb-recording-ready-url', null));
        }

        $meetingParams->setFreeJoin($request->get('freeJoin', false));

        $presentation = (array) $request->get('presentation', null);
        foreach ($presentation as $item) {
            if (isset($item['fileName']) && ! empty($item['fileName'])) {
                if (isset($item['link']) && ! empty($item['link'])) {
                    $meetingParams->addPresentation(trim($item['link']), null, trim($item['fileName']));
                } elseif (isset($item['content']) && ! empty($item['content'])) {
                    $meetingParams->addPresentation(trim($item['fileName']), trim($item['content']), null);
                }
            }
        }

        $meta = (array) $request->get('meta', null);
        foreach ($meta as $key => $value) {
            $meetingParams->addMeta(trim($key), trim($value));
        }

        return $meetingParams;
    }

    /**
     * @param array $parameters
     *
     * required fields:
     * meetingID
     * moderatorPW close meeting must be there moderator password
     *
     * @return EndMeetingParameters
     */
    public function initCloseMeeting(array $parameters)
    {
        $request = Fluent($parameters);

        return new EndMeetingParameters($request->meetingID, $request->moderatorPW);
    }

    /**
     * @param array $parameters
     *
     *  required fields
     *
     *  meetingID
     *  userName join by name
     *  password which role want to join
     *
     * @return JoinMeetingParameters
     */
    public function initJoinMeeting(array $parameters)
    {
        $request = Fluent($parameters);
        $meetingParams = new JoinMeetingParameters($request->meetingID, $request->userName, $request->password);
        $meetingParams->setRedirect($request->get('redirect', config('bigbluebutton.join.redirect', true)));
        $meetingParams->setJoinViaHtml5($request->get('joinViaHtml5', config('bigbluebutton.join.joinViaHtml5', true)));
        $meetingParams->setUserId($request->get('userId', null));
        if ($request->createTime) {
            $meetingParams->setCreationTime($request->createTime);
        }
        if ($request->configToken) {
            $meetingParams->setConfigToken($request->configToken);
        }
        if ($request->webVoiceConf) {
            $meetingParams->setWebVoiceConf($request->webVoiceConf);
        }
        if ($request->avatarUrl) {
            $meetingParams->setAvatarURL($request->avatarUrl);
        }
        if ($request->clientUrl) {
            $meetingParams->setClientURL($request->clientUrl);
        }
        if ($request->customParameters && is_array($request->customParameters)) {
            foreach ($request->customParameters as $key => $value) {
                $meetingParams->setCustomParameter($key, $value);
            }
        }

        return $meetingParams;
    }

    /**
     * @param $parameters
     *
     * required fields
     * meetingID
     *
     * @return IsMeetingRunningParameters
     */
    public function initIsMeetingRunning($parameters)
    {
        $meetingID = '';
        if (is_array($parameters)) {
            $meetingID = Fluent($parameters)->get('meetingID');
        } else {
            $meetingID = $parameters;
        }

        return new IsMeetingRunningParameters($meetingID);
    }

    /**
     * @param $parameters
     *
     * required fields
     * meetingID
     * moderatorPW must be there moderator password
     *
     * @return GetMeetingInfoParameters
     */
    public function initGetMeetingInfo($parameters)
    {
        $request = Fluent($parameters);

        return new GetMeetingInfoParameters($request->meetingID, $request->moderatorPW);
    }

    private function makeJoinMeetingArray($object, $parameters)
    {
        $pass['meetingID'] = $object->get('meetingID');
        $pass['password'] = $object->get('moderatorPW');
        if (isset($parameters['userName'])) {
            $pass['userName'] = $parameters['userName'];
        }
        $pass['meetingName'] = $object->get('meetingName');
        if (isset($parameters['redirect'])) {
            $pass['redirect'] = $parameters['redirect'];
        }

        return $pass;
    }

    /**
     * @param array $parameters
     *
     * required fields
     * meetingID
     * meetingName
     * userName
     * attendeePW
     * moderatorPW
     *
     * @return mixed
     */
    public function initStart(array $parameters)
    {
        if ($this->getMeetingInfo($parameters)->isEmpty()) {
            $object = $this->create($parameters);
            if (method_exists($object, 'isEmpty') && ! $object->isEmpty()) {
                return $this->join($this->makeJoinMeetingArray($object, $parameters));
            }
        } else {
            if (isset($parameters['moderatorPW'])) {
                $parameters['password'] = trim($parameters['moderatorPW']);
            }

            return $this->join($parameters);
        }
    }
}
