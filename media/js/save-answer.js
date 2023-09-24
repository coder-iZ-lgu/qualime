
const inputsScraper = () => {
    const inputsObject = document.getElementsByTagName("input")
    const inputsArray = [...inputsObject]

    return inputsArray
}

const inputsValidator = (inputs) => {
    const validatedInputs = []

    inputs.forEach((input) => {
        const inputId = input.id

        if (inputId.includes("option")) {
            validatedInputs.push(input)
        }
    })

    return validatedInputs
}

const getStoredAnswersByTestId = (testId) => {
    const storedAnswersString = localStorage.getItem(testId)

    if (storedAnswersString) {
        const storedAnswersObject = JSON.parse(storedAnswersString)

        return storedAnswersObject
    }

    return null
}

const getStoredAnswersByTaskId = (storedAnswers, taskId) => {
    if (storedAnswers instanceof Object) {
        const storedAnswersWithTaskId = storedAnswers[taskId]

        return storedAnswersWithTaskId
    }

    return null
}

const removeAnswer = (testId) => {
    localStorage.removeItem(testId)
}

const storeAnswer = (testId, answer) => {
    const parsedStoreAnswerData = JSON.stringify(answer)
    localStorage.setItem(testId, parsedStoreAnswerData)
}

const createAnswerObject = (testId, taskId, answer) => {
    const storedAnswersWithTestId = getStoredAnswersByTestId(testId)

    if (!storedAnswersWithTestId) {
        const storeAnswerData = {
            [taskId]: answer
        }

        return storeAnswerData
    }

    else {
        const storeAnswerData = {
            ...storedAnswersWithTestId,
            [taskId]: answer
        }

        return storeAnswerData
    }
}

const getTestId = () => {
    const testId = document.querySelector("#particular-test").getAttribute("data-qlty-test")

    return testId
}

const getDataForStoreAnswer = (e) => {
    const target = e.target
    const taskId = target.name
    const inputId = target.id
    const inputType = target.type
    const inputValue = inputType === "text" ? target.value : target.checked
    const testId = getTestId()

    const answer = {
        inputId,
        inputType,
        inputValue
    }

    return [testId, taskId, answer]
}

const handleInputRadio = (e) => {
    const [testId, taskId, answer] = getDataForStoreAnswer(e)
    const isChecked = answer.inputValue

    if (isChecked) {
        const storeAnswerData = createAnswerObject(testId, taskId, [answer])

        storeAnswer(testId, storeAnswerData)
    }
}

const handleInputCheckbox = (e) => {
    const [testId, taskId, answer] = getDataForStoreAnswer(e)
    const isChecked = answer.inputValue
    const inputId = answer.inputId

    const storedAnswersWithTestId = getStoredAnswersByTestId(testId)
    const storedAnswersWithTaskId = getStoredAnswersByTaskId(storedAnswersWithTestId, taskId) || []

    if (isChecked) {
        storedAnswersWithTaskId.push(answer)
        const storeAnswersData = createAnswerObject(testId, taskId, storedAnswersWithTaskId)

        storeAnswer(testId, storeAnswersData)
    } else {
        const filteredAnswers = storedAnswersWithTaskId.filter(answer => answer.inputId != inputId)
        const storeAnswersData = createAnswerObject(testId, taskId, filteredAnswers)

        storeAnswer(testId, storeAnswersData)
    }
}

const handleInputText = (e) => {
    const [testId, taskId, answer] = getDataForStoreAnswer(e)
    const storeAnswerData = createAnswerObject(testId, taskId, [answer])

    storeAnswer(testId, storeAnswerData)
}

const addEventListenerForInputs = (inputs) => {
    const events = [{
        type: "radio",
        handle: handleInputRadio
    }, {
        type: "checkbox",
        handle: handleInputCheckbox
    }, {

        type: "text",
        handle: handleInputText
    }]

    inputs.forEach((input) => {
        const inputType = input.type

        events.forEach(({ type: eventType, handle }) => {
            if (inputType == eventType) {
                input.addEventListener("change", handle)
            }
        })
    })
}

const addStoredAnswersToInputs = () => {
    const testId = getTestId()
    const storedAnswers = getStoredAnswersByTestId(testId)

    Object.entries(storedAnswers).forEach(([_, answers]) => {
        answers.forEach(({ inputId, inputType, inputValue }) => {
            const input = document.querySelector(`#${inputId}`)

            if (inputType === "text") {
                input.value = inputValue
            } else {
                input.checked = inputValue
            }
        })

    })
}

const addEventListenerToCheckButton = () => {
    const testId = getTestId()
    const checkButton = document.querySelector("#check-button")

    checkButton.addEventListener("click", () => {
        removeAnswer(testId)
    })
}

const main = () => {
    const inputs = inputsScraper()
    const validatedInputs = inputsValidator(inputs)

    addEventListenerForInputs(validatedInputs)
    addStoredAnswersToInputs()
    addEventListenerToCheckButton()
}

document.addEventListener("DOMContentLoaded", main)