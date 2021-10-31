<?php

namespace JoisarJignesh\Bigbluebutton\Services;

use BigBlueButton\Parameters\DeleteRecordingsParameters;
use BigBlueButton\Parameters\GetRecordingsParameters;
use BigBlueButton\Parameters\PublishRecordingsParameters;

trait InitRecordings
{
    /**
     * @param mixed $parameters
     *
     * optional fields
     * meetingID
     * recordID
     * state
     *
     * @return GetRecordingsParameters
     */
    public function initGetRecordings($parameters)
    {
        $request = Fluent($parameters);
        $recordings = new GetRecordingsParameters();

        $recordings->setMeetingId(implode(',', (array) $request->get('meetingID')));
        $recordings->setRecordId(implode(',', (array) $request->get('recordID')));
        $recordings->setState($request->get('state', config('bigbluebutton.getRecordings.state')));

        return $recordings;
    }

    /**
     * @param mixed $parameters
     *
     * required fields
     * recordID
     *
     * @return PublishRecordingsParameters
     */
    public function initPublishRecordings($parameters)
    {
        $request = Fluent($parameters);
        $recordings = new PublishRecordingsParameters(null, $request->get('publish', true));
        $recordings->setRecordingId(implode(',', (array) $request->get('recordID')));

        return $recordings;
    }

    /**
     * @param mixed $recording
     *
     * required fields
     * recordID
     *
     * @return DeleteRecordingsParameters
     */
    public function initDeleteRecordings($recording)
    {
        $request = Fluent($recording);

        return new DeleteRecordingsParameters(implode(',', (array) $request->get('recordID')));
    }
}
