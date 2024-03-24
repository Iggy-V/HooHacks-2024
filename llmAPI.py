import sys
from openai import OpenAI

def get_suggestion(query):
    client = OpenAI(
        base_url="https://api.endpoints.anyscale.com/v1",
        api_key="esecret_tq3mcn3tpxb3vi5nbk6away7d4"  # Replace with your actual OpenAI API key
    )
    # Note: not all arguments are currently supported and will be ignored by the backend.
    chat_completion = client.chat.completions.create(
        model="mistralai/Mistral-7B-Instruct-v0.1",
        messages=[{"role": "system", "content": "You are a helpful assistant."},
                  {"role": "user", "content": query}],
        temperature=0.1,
        stream=True
    )
    for message in chat_completion:
        return message.choices[0].delta.content  # Return the suggestion

if __name__ == "__main__":
    query = sys.argv[1]
    suggestion = get_suggestion(query)
    print(suggestion, end="", flush=True)