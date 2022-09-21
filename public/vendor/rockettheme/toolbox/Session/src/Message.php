<?php

namespace RocketTheme\Toolbox\Session;

/**
 * Implements session messages.
 *
 * @package RocketTheme\Toolbox\Session
 * @author RocketTheme
 * @license MIT
 */
class Message
{
    /** @var array */
    protected $messages = [];

    /**
     * Add message to the queue.
     *
     * @param string $message
     * @param string $scope
     * @return $this
     */
    public function add($message, $scope = 'default')
    {
        $key = md5($scope.'~'.$message);
        $item = ['message' => $message, 'scope' => $scope];

        // don't add duplicates
        if (!array_key_exists($key, $this->messages)) {
            $this->messages[$key] = $item;
        }

        return $this;
    }

    /**
     * Clear message queue.
     *
     * @param string|null $scope
     * @return $this
     */
    public function clear($scope = null)
    {
        if ($scope === null) {
            $this->messages = [];
        } else {
            foreach ($this->messages as $key => $message) {
                if ($message['scope'] === $scope) {
                    unset($this->messages[$key]);
                }
            }
        }
        return $this;
    }

    /**
     * Fetch all messages.
     *
     * @param string|null $scope
     * @return array
     */
    public function all($scope = null)
    {
        if ($scope === null) {
            return array_values($this->messages);
        }

        $messages = [];
        foreach ($this->messages as $message) {
            if ($message['scope'] === $scope) {
                $messages[] = $message;
            }
        }

        return $messages;
    }

    /**
     * Fetch and clear message queue.
     *
     * @param string|null $scope
     * @return array
     */
    public function fetch($scope = null)
    {
        $messages = $this->all($scope);
        $this->clear($scope);

        return $messages;
    }

}
